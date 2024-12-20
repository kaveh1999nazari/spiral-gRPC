<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Attribute\ValidateBy;
use App\Domain\Entity\Attribute;
use App\Domain\Entity\Category;
use App\Domain\Entity\AttributeValue;
use App\Domain\Entity\Product;
use App\Domain\Entity\ProductAttribute;
use App\Domain\Entity\ProductPrice;
use App\Domain\Request\ProductStoreRequest;
use App\Domain\Request\ProductSearchRequest as ProductSearchQueryRequest;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\product\product_name;
use GRPC\product\productCreateRequest;
use GRPC\product\productCreateResponse;
use GRPC\product\productFilterSearchRequest;
use GRPC\product\productFilterSearchResponse;
use GRPC\product\ProductGrpcInterface;
use GRPC\product\productSearchRequest;
use GRPC\product\productSearchResponse;
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

        foreach ($in->getAttributes() as $key => $attributeList){
            $attributes[$key] = iterator_to_array($attributeList->getValues());
        }

        $category = $this->checkCategoryExist($in->getCategoryId());

        $imagePaths = $this->checkUploadImage(iterator_to_array($in->getImage()));

        $product = $this->orm->getRepository(Product::class)
            ->create($in->getName(), $in->getBrand(), $in->getDescription(),
                $imagePaths, $in->getInStock(), $category);

        $this->createProductPrice($product->getId(), $options, $in->getPrice());

        $this->createProductAttribute($product->getId(), $attributes);


        $response = new ProductCreateResponse();
        $response->setId($product->getId());
        $response->setName($product->getName());
        return $response;
    }

    #[ValidateBy(ProductSearchQueryRequest::class)]
    public function ProductSearch(GRPC\ContextInterface $ctx, ProductSearchRequest $in): ProductSearchResponse
    {
        $products = $this->orm->getRepository(Product::class)
            ->select()
            ->where('name', 'LIKE', "%{$in->getName()}%")
            ->fetchAll();

        if(empty($products)){
            throw new GRPC\Exception\GRPCException(
                message: "Not Found!",code: Code::NOT_FOUND
            );
        }

        return $this->buildSearchResponse($products);
    }

    public function ProductFilterSearch(GRPC\ContextInterface $ctx, ProductFilterSearchRequest $in): ProductFilterSearchResponse
    {
        $results = $this->setFilterProducts($in->getName(), $in->getList());

        $response = new ProductFilterSearchResponse();
        foreach ($results as $product) {
            $productName = new product_name();
            $productName->setName($product->getName());
            $response->getResult()[] = $productName;
        }

        return $response;
    }

    // ------ Methods -------

    private function checkCategoryExist(int $id): Category
    {
        $category = $this->orm->getRepository(Category::class)
            ->findByPK($id);

        if (!$category) {
            throw new \Exception("Category not found for ID: {$id}");
        }
        return $category;
    }
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

    private function createProductAttribute(int $id, array $attributes): void
    {
        $product = $this->orm->getRepository(Product::class)
            ->findByPK($id);

        $cartesianAttributes = $this->cartesian($attributes);
        foreach ($cartesianAttributes as $keys => $values){

            $attribute = $this->orm->getRepository(Attribute::class)
                ->findByPK($values[0]);

            $attributeValue = $this->orm->getRepository(AttributeValue::class)
                ->findByPK($values[1]);

            $this->orm->getRepository(ProductAttribute::class)
                ->create($product, $attribute, $attributeValue);
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

    private function buildSearchResponse(array $products): ProductSearchResponse
    {
        $response = new ProductSearchResponse();

        $results = [];
        foreach ($products as $product){
            $result = new product_name();
            $result->setName($product->getName());

            $results[] = $result;
        }

        $response->setResult($results);

        return $response;

    }

    private function setFilterProducts(string $name, $lists)
    {
        $products = $this->orm->getRepository(Product::class)
            ->select()
            ->where('name', 'LIKE', "%{$name}%")
            ->fetchAll();

        $attributes = $lists;

        $results = [];
        foreach ($products as $product) {
            $matchCount = 0;

            foreach ($attributes as $attribute) {
                $result = $this->orm->getRepository(ProductAttribute::class)
                    ->select()
                    ->where('product_id', $product->getId())
                    ->andWhere('attribute_id', $attribute->getAttributeId())
                    ->andWhere('attribute_value_id', $attribute->getAttributeValueId())
                    ->fetchOne();

                if ($result !== null) {
                    $matchCount++;
                }
            }

            if ($matchCount === count($attributes)) {
                $results[] = $product;
            }
        }
        return $results;
    }
}
