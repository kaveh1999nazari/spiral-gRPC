<?php

namespace App\Domain\Entity;


use App\Domain\Repository\ProductPriceRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: ProductPriceRepository::class, table: "product_prices")]
class ProductPrice
{
    #[Column(type: "primary")]
    private int $id;
    #[BelongsTo(target: Product::class, nullable: false)]
    private Product $product;
    #[Column(type: "string")]
    private string $options;
    #[Column(type: "float")]
    private float $price;
    #[Column(type: 'float')]
    private ?float $discountPercentage;
    #[Column(type: 'datetime')]
    private ?\DateTimeImmutable $discountEndAt;
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

    public function getOptions(): array
    {
        return json_decode($this->options);
    }

    public function setOptions(array $options): void
    {
        $this->options = json_encode($options);
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getDiscountPercentage(): float
    {
        return $this->discountPercentage;
    }

    public function setDiscountPercentage(float $discountPercentage): void
    {
        $this->discountPercentage = $discountPercentage;
    }

    public function getDiscountEndAt(): \DateTimeImmutable
    {
        return $this->discountEndAt;
    }

    public function setDiscountEndAt(\DateTimeImmutable $discountEndAt): void
    {
        $this->discountEndAt = $discountEndAt;
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
