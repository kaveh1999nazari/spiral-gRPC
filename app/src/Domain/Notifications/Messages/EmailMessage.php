<?php

namespace App\Domain\Notifications\Messages;

use Symfony\Component\Mailer\Mailer;

class EmailMessage
{
    public string $email;

    public function receiver(string $email): string
    {
        return $this->email;
    }

}
