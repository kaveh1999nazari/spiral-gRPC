<?php

namespace App\Domain\Entity;

use App\Domain\Repository\ProductRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;

#[Entity(repository: ProductRepository::class, table: "products")]
class Product
{
    #[Column(type:'primary')]
    private int $id;
    #[Column(type:'string')]
    private string $name;
    #[Column(type: 'string')]
    private string $brand;
    #[Column(type:'string')]
    private string $description;
    #[Column(type:'string')]
    private string $image;
    #[Column(type: 'string')]
    private string $inStock;
    #[BelongsTo(target: Category::class, nullable: false)]
    private Category $category;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $updatedAt;
    #[HasMany(target: ProductPrice::class)]
    private array $productPrice;
    #[HasMany(target: ProductAttribute::class)]
    private array $productAttribute;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getImage(): array
    {
    return json_decode($this->image, true);
    }

    public function setImage(array $image): void
    {
        $this->image = json_encode($image);
    }

    public function getInStock(): string
    {
        return $this->inStock;
    }

    public function setInStock(string $inStock): void
    {
        $this->inStock = $inStock;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;
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

    public function getProductPrice(): array
    {
        return $this->productPrice;
    }

    public function setProductPrice(array $productPrice): void
    {
        $this->productPrice = $productPrice;
    }

    public function getProductAttribute(): array
    {
        return $this->productAttribute;
    }

    public function setProductAttribute(array $productAttribute): void
    {
        $this->productAttribute = $productAttribute;
    }

}
