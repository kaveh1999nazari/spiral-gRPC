<?php

namespace App\Domain\Entity;


use App\Domain\Repository\OrderRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;

#[Entity(repository: OrderRepository::class ,table: 'orders')]
class Order
{
    #[Column(type: 'primary')]
    private int $id;
    #[BelongsTo(User::class)]
    private User $user;
    #[Column(type: 'string')]
    private string $totalPrice;
    #[Column(type: 'string')]
    private string $status;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $updatedAt;
    #[HasMany(target: OrderItem::class)]
    private array $orderItem;

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

    public function getTotalPrice(): string
    {
        return $this->totalPrice;
    }

    public function setTotalPrice(string $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
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

    public function getOrderItem(): array
    {
        return $this->orderItem;
    }

    public function setOrderItem(array $orderItem): void
    {
        $this->orderItem = $orderItem;
    }

}
