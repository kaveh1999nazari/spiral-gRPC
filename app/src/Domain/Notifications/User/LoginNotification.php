<?php

namespace App\Domain\Notifications\User;

use App\Domain\Entity\User;
use App\Domain\Notifications\Messages\AppMessage;
use Spiral\Config\ConfiguratorInterface;
use Spiral\Core\ConfigsInterface;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Symfony\Component\Notifier\Notification\Notification;


class LoginNotification extends Notification
{
    public function __construct(private readonly MailerInterface $mailer,
                                private readonly ConfiguratorInterface  $config)
    {
        parent::__construct();
    }

    public function toApp()
    {
        return (new AppMessage)
            ->data([
                'date' => (new \DateTimeImmutable())->format('Y-m-d'),
                'hour' => (new \DateTimeImmutable())->format('H:i:s')
            ])
            ->message('you have login successfully in :date: - :hour: !')
            ->toArray();
    }
    public function toEmail(User $user): void
    {
        $this->mailer->send(new Message(
            'emails/login.email.dark.php',
            $user->getEmail(),
            [
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'login_time' => date('Y-m-d H:i:s')
            ]
        ));
    }

}
