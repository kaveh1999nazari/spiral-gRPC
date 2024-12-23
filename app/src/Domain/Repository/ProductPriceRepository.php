<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Product;
use App\Domain\Entity\ProductPrice;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class ProductPriceRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager,
                                                private readonly ORMInterface $ORM)
    {
        parent::__construct($select);
    }

    public function create(Product $product, array $options, float $price)
    {
        $productPrice = new ProductPrice();
        $productPrice->setProduct($product);
        $productPrice->setOptions($options);
        $productPrice->setPrice($price);
        $productPrice->setCreatedAt(new \DateTimeImmutable());
        $productPrice->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($productPrice);
        $this->entityManager->run();

        return $productPrice;
    }

    public function addDiscount(int $id, float $discountPercentage, string $time)
    {
        $productPrice = $this->ORM->getRepository(ProductPrice::class)
            ->findByPK($id);

        if (!$productPrice) {
            throw new \Exception("ProductPrice with ID {$id} not found or can't be hydrated.");
        }

        $productPrice->setDiscountPercentage($discountPercentage);
        $productPrice->setDiscountEndAt(new \DateTimeImmutable($time));

        $this->entityManager->persist($productPrice);
        $this->entityManager->run();

        return $productPrice;
    }

}
