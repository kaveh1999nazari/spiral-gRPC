<?php

namespace App\Domain\Entity;

use App\Domain\Repository\ProductAttributeRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: ProductAttributeRepository::class, table: 'product_attributes')]
class ProductAttribute
{
    #[Column(type: "primary")]
    private int $id;

    #[BelongsTo(target: Product::class, nullable: false)]
    private Product $product;
    #[BelongsTo(target: Attribute::class, nullable: false)]
    private Attribute $attribute;
    #[BelongsTo(target: AttributeValue::class, nullable: false)]
    private AttributeValue $attribute_value;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $updatedAt;

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
        return $this->attribute_value;
    }

    public function setAttributeValue(AttributeValue $attribute_value): void
    {
        $this->attribute_value = $attribute_value;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}
