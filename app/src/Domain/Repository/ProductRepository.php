<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Category;
use App\Domain\Entity\Product;
use Cycle\Database\DatabaseManager;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class ProductRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager,
                                                private readonly ORMInterface $ORM,
                                                private readonly DatabaseManager $dbal)
    {
        parent::__construct($select);
    }

    public function create(string $name, ?string $brand,
                           string $description, ?array $image, ?string $inStock,
                           Category $category): Product
    {
        $product = new Product();
        $product->setName($name);
        $product->setBrand($brand);
        $product->setDescription($description);
        $product->setImage($image);
        $product->setInStock($inStock);
        $product->setCategory($category);
        $product->setCreatedAt(new \DateTimeImmutable());
        $product->setUpdatedAt(new \DateTimeImmutable());

        try {
            $this->entityManager->persist($product)
                ->run();
        } catch (\Exception $e) {
            print_r($e);
            exit;
        }

        return $product;
    }

    public function search(string $name)
    {
        return $this->ORM->getRepository(Product::class)
            ->select()
            ->where('name', 'LIKE', "%{$name}%")
            ->fetchAll();
    }

    public function findSimilar(int $productId, int $minSharedAttributes = 8)
    {
        $db = $this->dbal->database('default');

        $productAttribute = $db
            ->select([
                'p.id AS product_id',
                'p.name AS product_name',
                'COUNT(pa.attribute_id) AS shared_attributes_count'
            ])
            ->from('product_attributes as pa')
            ->innerJoin('product_attributes', 'tpa')
            ->on('pa.attribute_id', 'tpa.attribute_id')
            ->andOn('pa.attribute_value_id', 'tpa.attribute_value_id')
            ->innerJoin('products', 'p')
            ->on('pa.product_id', 'p.id')
            ->where('tpa.product_id', $productId)
            ->andWhere('p.id', '!=', $productId)
            ->having('COUNT(pa.attribute_id)', '>', 8)
            ->groupBy('p.id, p.name')
            ->orderBy('shared_attributes_count', 'desc')
            ->fetchAll();

        return $productAttribute;
    }

}
