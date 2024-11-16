<?php

namespace App\Domain\Entity;

use App\Domain\Repository\UserRepository;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

#[Entity(repository: UserRepository::class, table: "users")]
class User
{
    #[Column(type: 'primary')]
    private int $id;
    #[Column(type: 'string')]
    private string $mobile;
    #[Column(type: 'string')]
    private string $password;
    #[Column(type: 'json')]
    private string $roles;

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

    public function getRoles(): array
    {
        return json_decode($this->roles, true);
    }

    public function setRoles(array $roles): void
    {
        $this->roles = json_encode($roles);
    }

}
