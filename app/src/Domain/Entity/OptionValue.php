<?php

namespace App\Domain\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

class OptionValue
{
    #[Column(type: "primary")]
    private int $id;
    #[Column(type: "string")]
    private string $name;
    #[BelongsTo(target: Option::class, nullable: false)]
    private Option $option;

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

    public function getOption(): Option
    {
        return $this->option;
    }

    public function setOption(Option $option): void
    {
        $this->option = $option;
    }

}
