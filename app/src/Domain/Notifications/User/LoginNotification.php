<?php

namespace App\Domain\Notifications\User;

use App\Domain\Entity\User;
use App\Domain\Notifications\BaseNotification;
use App\Domain\Notifications\Messages\AppMessage;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Symfony\Component\Notifier\Recipient\RecipientInterface;

class LoginNotification extends BaseNotification
{
    protected string $type = 'user';

    public function __construct(User $user)
    {
        parent::__construct();
    }
    private readonly MailerInterface $mailer;


    public function toApp(): array
    {
        return (new AppMessage)
            ->data([
                'date' => (new \DateTimeImmutable())->format('Y-m-d'),
                'hour' => (new \DateTimeImmutable())->format('H:i:s')
            ])
            ->message('You have logged in successfully on :date: at :hour:!')
            ->toArray();
    }

    public function toEmail(RecipientInterface $recipient): void
    {
        if (!$recipient instanceof User) {
            throw new \InvalidArgumentException('Recipient must be an instance of User.');
        }

        $this->mailer->send(new Message(
            'emails/login.email.dark.php',
            $recipient->getEmail(),
            [
                'first_name' => $recipient->getFirstName(),
                'last_name' => $recipient->getLastName(),
                'login_time' => date('Y-m-d H:i:s')
            ]
        ));
    }
}

