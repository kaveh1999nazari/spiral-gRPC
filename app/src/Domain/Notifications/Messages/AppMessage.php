<?php

namespace App\Domain\Notifications\Messages;

class AppMessage extends BasicMessage
{
    public string $link;

    public function link(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'message' => $this->_getFilledMessage(),
            'link' => $this->link
        ];
    }

    private function _getFilledMessage(): string
    {
        $message = $this->message;
        foreach ($this->data as $field => $value){
            $message = str_replace(':' . $field . ':', $value, $message);
        }
        return $message;
    }

}
