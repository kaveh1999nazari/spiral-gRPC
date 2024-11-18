<?php

namespace App\Domain\Entity;

use Cycle\Annotated\Annotation\Column;

class Option
{
    #[Column(type: "primary")]
    private int $id;
    #[Column(type: 'string')]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}
