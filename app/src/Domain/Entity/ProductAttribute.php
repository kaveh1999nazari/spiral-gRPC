<?php

namespace App\Domain\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(role: 'productAttribute', table: 'product_attributes')]
class ProductAttribute
{
    #[Column(type: "primary")]
    private int $id;

    #[BelongsTo(target: Product::class, nullable: false)]
    private Product $product;

    #[BelongsTo(target: Attribute::class, nullable: false)]
    private Attribute $attribute;

    #[BelongsTo(target: AttributeValue::class, nullable: false)]
    private AttributeValue $attributeValue;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(Attribute $attribute): void
    {
        $this->attribute = $attribute;
    }

    public function getAttributeValue(): AttributeValue
    {
        return $this->attributeValue;
    }

    public function setAttributeValue(AttributeValue $attributeValue): void
    {
        $this->attributeValue = $attributeValue;
    }

}
