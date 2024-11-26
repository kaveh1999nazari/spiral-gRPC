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
    #[BelongsTo(target: User::class)]
    private User $user;
    #[Column(type: 'string')]
    private string $uuid;
    #[BelongsTo(target: ProductPrice::class)]
    private ProductPrice $productPrice;
    #[Column(type: 'integer')]
    private int $number;
    #[Column(type: "string")]
    private string $totalPrice;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
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
        return $this->productPrice;
    }

    public function setProductPrice(ProductPrice $productPrice): void
    {
        $this->productPrice = $productPrice;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }

    public function getTotalPrice(): string
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(string $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }
}
