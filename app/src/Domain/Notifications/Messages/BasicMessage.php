<?php

namespace App\Domain\Notifications\Messages;

class BasicMessage
{
    public array $data = [];
    public string $message;

    public function data(array $data): self
   {
        $this->data = $data;
        return $this;
   }

   public function message(string $message): self
   {
       $this->message = $message;
       return $this;
   }

   public function toArray(): array
   {
        return [
            'title' => $this->data,
            'message' => $this->message
        ];
   }
}
