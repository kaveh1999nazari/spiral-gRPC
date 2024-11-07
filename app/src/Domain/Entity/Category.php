<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

#[Entity(repository: CategoryRepository::class, table: "categories")]
class Category
{
    #[Column(type:"primary")]
    private int $id;
    #[Column(type:"string")]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    // Getter and Setter for Name
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

}
