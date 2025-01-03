<?php

namespace App\Domain\Entity;

use App\Domain\Repository\NotificationPreferenceRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: NotificationPreferenceRepository::class, table: 'notification_preferences')]
class NotificationPreference
{
    #[Column(type: 'primary')]
    private int $id;
    #[BelongsTo(target: User::class)]
    private User $user;
    #[BelongsTo(target: NotificationType::class)]
    private NotificationType $notification_type;
    #[BelongsTo(target: NotificationChannel::class)]
    private NotificationChannel $notification_channel;
    #[Column(type: 'boolean')]
    private bool $isEnabled;
    #[Column(type: 'boolean')]
    private bool $isUserModifiable;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $updatedAt;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getNotificationType(): NotificationType
    {
        return $this->notification_type;
    }

    public function setNotificationType(NotificationType $notification_type): void
    {
        $this->notification_type = $notification_type;
    }

    public function getNotificationChannel(): NotificationChannel
    {
        return $this->notification_channel;
    }

    public function setNotificationChannel(NotificationChannel $notification_channel): void
    {
        $this->notification_channel = $notification_channel;
    }

    public function isEnabled(): bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): void
    {
        $this->isEnabled = $isEnabled;
    }

    public function isUserModifiable(): bool
    {
        return $this->isUserModifiable;
    }

    public function setIsUserModifiable(bool $isUserModifiable): void
    {
        $this->isUserModifiable = $isUserModifiable;
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
