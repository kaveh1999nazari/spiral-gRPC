<?php

namespace App\Domain\Entity;

use App\Domain\Repository\ProductRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: ProductRepository::class, table: "products")]
class Product
{
    #[Column(type:'primary')]
    private int $id;
    #[Column(type:'string')]
    private string $name;
    #[Column(type:'string')]
    private string $description;
    #[Column(type:'json')]
    private array $image;
    #[BelongsTo(target: Category::class, innerKey: 'category_id', nullable: false)]
    private Category $category;

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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getImage(): array
    {
    return $this->image;
    }

    public function setImage(array $image): void
    {
        $this->image = $image;
    }

    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

}
