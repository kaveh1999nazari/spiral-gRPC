<?php

namespace App\Endpoint\Job;

use Spiral\Core\Attribute\Proxy;
use Spiral\Core\InvokerInterface;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Spiral\Queue\JobHandler;

class SendLoginNotificationEmailJob extends JobHandler
{
    public function __construct(#[Proxy] InvokerInterface $invoker, private readonly MailerInterface $mailer)
    {
        parent::__construct($invoker);
    }

    public function invoke(string $firstName, string $lastName, string $email)
    {
        $this->sendLoginNotificationEmail($firstName, $lastName, $email);
    }

    private function sendLoginNotificationEmail(?string $firstName, ?string $lastName, ?string $email)
    {
        $this->mailer->send(new Message(
            'emails/login.email.dark.php',
            $email,
            [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'login_time' => date('Y-m-d H:i:s')
            ]

        ));
    }

}
