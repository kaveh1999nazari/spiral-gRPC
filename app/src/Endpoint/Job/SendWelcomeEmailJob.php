<?php

namespace App\Endpoint\Job;

use Spiral\Core\Attribute\Proxy;
use Spiral\Core\InvokerInterface;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Spiral\Queue\JobHandler;

class SendWelcomeEmailJob extends JobHandler
{
    public function __construct(#[Proxy] InvokerInterface $invoker, private readonly MailerInterface $mailer)
    {
        parent::__construct($invoker);
    }

    public function invoke(string $firstName, string $lastName, string $email): void
    {
        $this->sendWelcomeEmail($firstName, $lastName, $email);
    }

    private function sendWelcomeEmail(?string $firstName, ?string $lastName, ?string $email): void
    {
        $this->mailer->send(new Message(
            'emails/welcome.email.dark.php',
            $email,
            [
                'first_name' => $firstName,
                'last_name' => $lastName
            ]

        ));
    }

}
