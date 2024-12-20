<?php

namespace App\Domain\Entity;

use App\Domain\Repository\CartRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: CartRepository::class, table: 'carts')]
class Cart
{
    #[Column(type: 'primary')]
    private int $id;
    #[BelongsTo(target: User::class, nullable: true)]
    private ?User $user = null;
    #[Column(type: 'string')]
    private string $uuid;
    #[BelongsTo(target: ProductPrice::class)]
    private ProductPrice $product_price;
    #[Column(type: 'integer')]
    private int $number;
    #[Column(type: "float")]
    private float $totalPrice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): void
    {
        $this->user = $user;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    public function getProductPrice(): ProductPrice
    {
        return $this->product_price;
    }

    public function setProductPrice(ProductPrice $product_price): void
    {
        $this->product_price = $product_price;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }
}
