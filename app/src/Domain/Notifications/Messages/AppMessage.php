<?php

namespace App\Domain\Notifications\Messages;

class AppMessage extends BasicMessage
{
    public string $link;

    public function link(string $link)
    {
        return $this->link;
    }

    public function toArray(): array
    {
        return [
            'message' => "{$this->title} : \n{$this->message}",
            'link' => $this->link
        ];

    }

}
