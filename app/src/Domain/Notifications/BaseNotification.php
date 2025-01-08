<?php

namespace App\Domain\Notifications;

use Symfony\Component\Notifier\Notification\Notification;


abstract class BaseNotification extends Notification
{
    protected string $type;

    public function getType(): string
    {
        return $this->type;
    }
}
