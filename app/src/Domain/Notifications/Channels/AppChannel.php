<?php

namespace App\Domain\Notifications\Channels;

use Symfony\Component\Notifier\Channel\ChannelInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\RecipientInterface;

class AppChannel implements ChannelInterface
{
    public function notify(Notification $notification, RecipientInterface $recipient, ?string $transportName = null): void
    {
        if (method_exists($notification, 'toApp')) {
            $appMessage = $notification->toApp();
        }
    }

    public function supports(Notification $notification, RecipientInterface $recipient): bool
    {
        return method_exists($notification, 'toApp');
    }

}
