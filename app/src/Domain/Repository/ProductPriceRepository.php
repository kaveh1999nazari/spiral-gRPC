<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Product;
use App\Domain\Entity\ProductPrice;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class ProductPriceRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(Product $product, array $options, string $price)
    {
        $productPrice = new ProductPrice();
        $productPrice->setProduct($product);
        $productPrice->setOptions($options);
        $productPrice->setPrice($price);

        $this->entityManager->persist($productPrice);
        $this->entityManager->run();

        return $productPrice;
    }

}
