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
    public function __construct(private readonly ORMInterface         $orm,
                                private readonly DirectoriesInterface $dirs,
    )
    {
    }

    #[AuthenticatedBy(['admin'])]
    #[ValidateBy(ProductStoreRequest::class)]
    public function ProductCreate(GRPC\ContextInterface $ctx, ProductCreateRequest $in): ProductCreateResponse
    {
        foreach ($in->getOptions() as $key => $optionList) {
            $options[$key] = iterator_to_array($optionList->getValues());
        }

        $category = $this->orm->getRepository(Category::class)
            ->findByPK($in->getCategoryId());

        if (!$category) {
            throw new \Exception("Category not found for ID: {$in->getCategoryId()}");
        }

        $imagePaths = $this->checkUploadImage(iterator_to_array($in->getImage()));

        $product = $this->orm->getRepository(Product::class)
            ->create($in->getName(), $in->getBrand(), $in->getDescription(),
                $imagePaths, $in->getInStock(), $category);

        $this->createProductPrice($product->getId(), $options, $in->getPrice());

        $response = new ProductCreateResponse();
        $response->setId($product->getId());
        $response->setName($product->getName());
        return $response;
    }

    // ------ Methods -------

    private function cartesian($input)
    {
        $result = [];
        foreach ($input as $key => $values) {
            foreach ($values as $value) {
                $result[] = [$key, $value];
            }
        }
        return $result;
    }

    private function createProductPrice(int $id, array $options, string $price): void
    {
        $product = $this->orm->getRepository(Product::class)
            ->findByPK($id);

        $cartesianOptions = $this->cartesian($options);

        foreach ($cartesianOptions as $combination) {
            $this->orm->getRepository(ProductPrice::class)
                ->create($product, $combination, $price);
        }
    }

    private function checkUploadImage(array $images): array
    {
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

        return $imagePaths;
    }
}
