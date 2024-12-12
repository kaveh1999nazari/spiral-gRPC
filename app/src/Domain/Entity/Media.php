<?php

namespace App\Domain\Entity;

use App\Domain\Repository\MediaRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity(repository: MediaRepository::class ,table: 'medias')]
class Media
{
    #[Column(type: 'primary')]
    private int $id;
    #[Column(type: 'string')]
    private string $entityType;
    #[Column(type: 'integer')]
    private int $entityId;
    #[Column(type: 'string')]
    private string $name;
    #[Column(type: 'string')]
    private string $pass;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEntityType(): string
    {
        return $this->entityType;
    }

    public function setEntityType(string $entityType): void
    {
        $this->entityType = $entityType;
    }

    public function getEntityId(): int
    {
        return $this->entityId;
    }

    public function setEntityId(int $entityId): void
    {
        $this->entityId = $entityId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function setPass(string $pass): void
    {
        $this->pass = $pass;
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
