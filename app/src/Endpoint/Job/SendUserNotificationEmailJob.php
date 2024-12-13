<?php

namespace App\Endpoint\Job;

use App\Domain\Entity\User;
use Spiral\Core\Attribute\Proxy;
use Spiral\Core\InvokerInterface;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Spiral\Queue\JobHandler;

class SendUserNotificationEmailJob extends JobHandler
{
    public function __construct(#[Proxy] InvokerInterface $invoker, private readonly MailerInterface $mailer)
    {
        parent::__construct($invoker);
    }

    public function invoke(bool $isNewUser, User $user): void
    {
        $emailHandler = $this->getEmailHandler($isNewUser);

        $emailHandler($user);
    }

    private function getEmailHandler(bool $isNewUser): callable
    {
        if ($isNewUser) {
            return function (User $user) {
                $this->sendWelcomeEmail($user);
            };
        }
        return function (User $user) {
            $this->sendLoginNotificationEmail($user);
        };
    }

    private function sendWelcomeEmail(User $user): void
    {
        $this->mailer->send(new Message(
            'emails/welcome.email.dark.php',
            $user->getEmail(),
            [
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName()
            ]
        ));
    }

    private function sendLoginNotificationEmail(User $user): void
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
