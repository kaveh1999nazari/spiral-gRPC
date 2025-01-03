<?php

namespace App\Domain\Notifications\Messages;

class BasicMessage
{
    public string $title;
    public string $message;

    public function getTitle(): string
   {
        return $this->title;
   }

   public function getMessage(): string
   {
       return $this->message;
   }

   public function toArray(): array
   {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
   }
}
