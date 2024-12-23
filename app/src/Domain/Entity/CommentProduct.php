<?php

namespace App\Domain\Entity;

use App\Domain\Repository\CommentProductRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: CommentProductRepository::class, table: 'product_comments')]
class CommentProduct
{
    #[Column(type: 'primary')]
    private int $id;
    #[BelongsTo(target: User::class)]
    private User $user;
    #[BelongsTo(target: ProductPrice::class)]
    private ProductPrice $product_price;
    #[BelongsTo(target: Order::class, nullable: true)]
    private ?Order $order;
    #[Column(type: 'text')]
    private string $comment;
    #[Column(type: 'boolean')]
    private bool $isActive;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;

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

    public function getProductPrice(): ProductPrice
    {
        return $this->product_price;
    }

    public function setProductPrice(ProductPrice $productPrice): void
    {
        $this->product_price = $productPrice;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): void
    {
        $this->order = $order;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
