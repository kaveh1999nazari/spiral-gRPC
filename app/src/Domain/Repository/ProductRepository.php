<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Category;
use App\Domain\Entity\Product;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class ProductRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(string $name, string $description, ?array $image, Category $category): Product
    {
        print_r($image);
        $product = new Product();
        $product->setName($name);
        $product->setDescription($description);
        $product->setImage($image);
        $product->setCategory($category);

        try {
            $this->entityManager->persist($product)
                ->run();
        } catch (\Exception $e) {
            print_r($e);
            exit;
        }

        return $product;
    }

}
