<?php

namespace App\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\ORM\RepositoryInterface;

#[Entity(repository: RepositoryInterface::class, table: "users")]
class User
{
    #[Column(type: 'primary')]
    private int $id;
    #[Column(type: 'string')]
    private string $mobile;
    #[Column(type: 'string')]
    private string $password;

    public function getId(): int
    {
        return $this->id;
    }

    // Getter and Setter for Mobile
    public function getMobile(): string
    {
        return $this->mobile;
    }

    public function setMobile(string $mobile): void
    {
        $this->mobile = $mobile;
    }

    // Getter and Setter for Password
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
