<?php

namespace App\Domain\Entity;

use App\Domain\Repository\CategoryRepository;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\HasMany;

#[Entity(repository: CategoryRepository::class, table: "categories")]
class Category
{
    #[Column(type:"primary")]
    private int $id;
    #[Column(type:"string")]
    private string $name;
//    #[HasMany(target: Product::class)]
//    private array $products = [];


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

    public function getProducts(): array
    {
        return $this->products;
    }

}
