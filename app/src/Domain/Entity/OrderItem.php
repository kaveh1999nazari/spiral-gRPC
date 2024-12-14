<?php

namespace App\Domain\Entity;

use App\Domain\Repository\OrderItemRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: OrderItemRepository::class, table: 'order_items')]
class OrderItem
{
    #[Column(type: 'primary')]
    private int $id;
    #[BelongsTo(target: User::class)]
    private User $user;
    #[BelongsTo(target: Order::class)]
    private Order $order;
    #[Column(type: 'integer')]
    private int $productPriceId;
    #[Column(type: 'integer')]
    private int $number;
    #[Column(type: 'string')]
    private string $price;
    #[Column(type: 'string')]
    private string $status;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $updatedAt;

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

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function getProductPriceId(): int
    {
        return $this->productPriceId;
    }

    public function setProductPriceId(int $productPriceId)
    {
        $this->productPriceId = $productPriceId;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function setNumber(int $number): void
    {
        $this->number = $number;
    }
    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
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
