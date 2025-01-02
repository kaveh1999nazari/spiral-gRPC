<?php

namespace App\Domain\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity(table: "notification_types")]
class NotificationType
{
    #[Column(type: 'primary', nullable: false)]
    private int $id;
    #[Column(type: 'string', unique: true)]
    private string $slug;
    #[Column(type:'string')]
    private string $name;
    #[Column(type:'datetime', nullable:true, default: 'CURRENT_TIMESTAMP')]
    private \DateTimeImmutable $createdAt;
    #[Column(type:'datetime', nullable:true, default: 'CURRENT_TIMESTAMP')]
    private \DateTimeImmutable $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
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
