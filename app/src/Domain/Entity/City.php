<?php

namespace App\Domain\Entity;

use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(table: 'cities')]
class City
{
    #[Column(type: 'primary')]
    private int $id;

    #[BelongsTo(target: Province::class, fkAction: 'CASCADE')]
    private Province $province;

    #[Column(type: 'string', length: 255, nullable: false)]
    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProvince(): Province
    {
        return $this->province;
    }

    public function setProvince(Province $province): void
    {
        $this->province = $province;
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
