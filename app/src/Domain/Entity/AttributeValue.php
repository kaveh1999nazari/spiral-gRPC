<?php

namespace App\Domain\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(role: 'attributeValue', table: 'attribute_values')]
class AttributeValue
{
    #[Column(type: "primary")]
    private int $id;
    #[Column(type: "string")]
    private string $name;
    #[BelongsTo(target: Attribute::class, nullable: false)]
    private Attribute $attribute;

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

    public function getAttribute(): Attribute
    {
        return $this->attribute;
    }

    public function setAttribute(Attribute $attribute): void
    {
        $this->attribute = $attribute;
    }

}
