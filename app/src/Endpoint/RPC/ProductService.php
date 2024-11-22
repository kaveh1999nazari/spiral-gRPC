<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Attribute\ValidateBy;
use App\Domain\Entity\Category;
use App\Domain\Entity\Product;
use App\Domain\Entity\ProductPrice;
use App\Domain\Request\ProductStoreRequest;
use Cycle\ORM\ORMInterface;
use GRPC\product\productCreateRequest;
use GRPC\product\productCreateResponse;
use GRPC\product\ProductGrpcInterface;
use Spiral\Boot\DirectoriesInterface;
use Spiral\RoadRunner\GRPC;


class ProductService implements ProductGrpcInterface
{
    public function __construct(private readonly ORMInterface $orm,
                                private readonly DirectoriesInterface $dirs,
    ){}

    #[AuthenticatedBy(['admin'])]
    #[ValidateBy(ProductStoreRequest::class)]
    public function ProductCreate(GRPC\ContextInterface $ctx, ProductCreateRequest $in): ProductCreateResponse
    {
        $name = $in->getName();
        $description = $in->getDescription() ?? null;
        $images = iterator_to_array($in->getImage()) ?? [];
        $categoryId = $in->getCategoryId();
        $price = $in->getPrice();
        $options = [];

        foreach ($in->getOptions() as $key => $optionList) {
            $options[$key] = iterator_to_array($optionList->getValues());
        }

        $category = $this->orm->getRepository(Category::class)->findByPK($categoryId);

        if (!$category) {
            throw new \Exception("Category not found for ID: $categoryId");
        }


        $imagePaths = [];
        if (!empty($images)) {
            $storagePath = $this->dirs->get('public');
            $datePath = date('Y/m/d');
            $uploadPath = $storagePath . '/uploads/' . $datePath;

            if (!is_dir($uploadPath)) {
                throw new \Exception("Upload directory does not exist: $uploadPath");
            }

            foreach ($images as $image) {
                $filePath = $uploadPath . '/' . $image;

                if (!file_exists($filePath)) {
                    throw new \Exception("File not found at path: $filePath");
                }

                $relativePath = $image;
                $imagePaths[] = $relativePath;
            }
        }

        $product = $this->orm->getRepository(Product::class)
            ->create($name, $description, $imagePaths, $category);

        $productId = $this->orm->getRepository(Product::class)->findByPK($product->getId());
        $cartesianOptions = $this->cartesian($options);

        foreach ($cartesianOptions as $combination)
        {
            $this->orm->getRepository(ProductPrice::class)
                ->create($productId, $combination, $price);
        }

        $response = new ProductCreateResponse();
        $response->setId($product->getId());
        $response->setName($product->getName());
        $response->setPrice($price);
        return $response;
    }
    private function cartesian($input)
    {
        $result = [[]];
        foreach ($input as $key => $values) {
            $append = [];
            foreach ($result as $product) {
                foreach ($values as $value) {
                    $append[] = array_merge($product, [$key => $value]);
                }
            }
            $result = $append;
        }
        return $result;
    }
}
