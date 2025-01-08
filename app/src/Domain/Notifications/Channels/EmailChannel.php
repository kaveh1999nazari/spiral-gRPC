<?php

namespace App\Domain\Notifications\Channels;

use http\Client\Curl\User;
use PhpParser\Node\Expr\Cast\Object_;
use Symfony\Component\Notifier\Channel\ChannelInterface;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Recipient\RecipientInterface;

class EmailChannel implements ChannelInterface
{
    public function notify(Notification $notification, RecipientInterface $recipient, ?string $transportName = null): void
    {
        if (method_exists($notification, 'toEmail')) {
            if ($recipient instanceof \App\Domain\Entity\User) {
                $notification->toEmail($recipient);
            } else {
                throw new \InvalidArgumentException('Recipient must be an instance of User.');
            }
        }
    }

    public function supports(Notification $notification, RecipientInterface $recipient): bool
    {
        return method_exists($notification, 'toEmail');
    }


}
