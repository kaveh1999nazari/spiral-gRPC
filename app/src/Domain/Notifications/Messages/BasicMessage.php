<?php

namespace App\Domain\Notifications\Messages;

class BasicMessage
{
    public array $data;
    public string $message;

    public function data(array $data): array
   {
        return $this->data = $data;
   }

   public function message(string $message): string
   {
       return $this->message = $message;
   }

   public function toArray(): array
   {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
   }
}
