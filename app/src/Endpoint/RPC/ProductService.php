<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Entity\Category;
use App\Domain\Entity\Product;
use Cycle\ORM\ORMInterface;
use GRPC\product\productCreateRequest;
use GRPC\product\productCreateResponse;
use GRPC\product\ProductGrpcInterface;
use Spiral\RoadRunner\GRPC;


class ProductService implements ProductGrpcInterface
{
    public function __construct(private readonly ORMInterface $orm){}

    #[AuthenticatedBy(['admin'])]
    public function ProductCreate(GRPC\ContextInterface $ctx, ProductCreateRequest $in): ProductCreateResponse
    {
        $name = $in->getName();
        $description = $in->getDescription() ?? null;
        $images = iterator_to_array($in->getImage()) ?? [];
        $categoryId = $in->getCategoryId();

        $category = $this->orm->getRepository(Category::class)->findByPK($categoryId);

        if (!$category) {
            throw new \Exception("Category not found for ID: $categoryId");
        }

        $storagePath = __DIR__ . '/../../storage/products/';
        if (!is_dir($storagePath)) {
            mkdir($storagePath, 0777, true);
        }

        $imagePaths = [];
        foreach ($images as $image) {
            $fileName = uniqid('product_', true) . ".jpg";
            $filePath = $storagePath . $fileName;

            file_put_contents($filePath, $image);
            $imagePaths[] = $fileName;
        }

        $product = $this->orm->getRepository(Product::class)
            ->create($name, $description, $imagePaths, $category);


        $response = new ProductCreateResponse();
        $response->setId($product->getId());
        $response->setName($product->getName());
        return $response;
    }

}
