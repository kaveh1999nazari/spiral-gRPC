<?php

namespace App\Domain\Entity;

use App\Domain\Repository\NotificationRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;

#[Entity(repository: NotificationRepository::class, table: 'notifications')]
class Notifications
{
    #[Column(type: 'primary')]
    private int $id;
    #[Column(type: 'string')]
    private string $type;
    #[Column(type: 'string')]
    private string $notificationType;
    #[Column(type: 'integer')]
    private int $notificationId;
    #[Column(type: 'string')]
    private string $data;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $readAt;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getNotificationType(): string
    {
        return $this->notificationType;
    }

    public function setNotificationType(string $notificationType): void
    {
        $this->notificationType = $notificationType;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function getNotificationId(): int
    {
        return $this->notificationId;
    }

    public function setNotificationId(int $notificationId): void
    {
        $this->notificationId = $notificationId;
    }

    public function getReadAt(): \DateTimeImmutable
    {
        return $this->readAt;
    }

    public function setReadAt(\DateTimeImmutable $readAt): void
    {
        $this->readAt = $readAt;
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
