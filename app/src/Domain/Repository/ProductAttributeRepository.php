<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Attribute;
use App\Domain\Entity\AttributeValue;
use App\Domain\Entity\Product;
use App\Domain\Entity\ProductAttribute;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class ProductAttributeRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(Product $product,
                           Attribute $attribute,
                           AttributeValue $attributeValue)
    {
        $productAttribute = new ProductAttribute();
        $productAttribute->setProduct($product);
        $productAttribute->setAttribute($attribute);
        $productAttribute->setAttributeValue($attributeValue);
        $productAttribute->setCreatedAt(new \DateTimeImmutable());
        $productAttribute->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($productAttribute);
        $this->entityManager->run();

        return $productAttribute;
    }

}
