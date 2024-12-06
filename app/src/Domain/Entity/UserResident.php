<?php

namespace App\Domain\Entity;

use App\Domain\Repository\UserResidentRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: UserResidentRepository::class, table: 'user_residents')]
class UserResident
{
    #[Column(type: 'primary')]
    private int $id;

    #[BelongsTo(target: User::class, fkAction: 'CASCADE')]
    private User $user;

    #[Column(type: 'string', length: 200, nullable: false)]
    private string $address;

    #[Column(type: 'string', length: 10, nullable: false)]
    private string $postalCode;

    #[BelongsTo(target: Province::class, fkAction: 'CASCADE')]
    private Province $province;

    #[BelongsTo(target: City::class, fkAction: 'CASCADE')]
    private City $city;

    #[Column(type: 'datetime', nullable: true, defaultValue: 'CURRENT_TIMESTAMP')]
    private \DateTimeImmutable $createdAt;

    #[Column(type: 'datetime', nullable: true, defaultValue: 'CURRENT_TIMESTAMP')]
    private \DateTimeImmutable $updatedAt;


    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getProvince(): Province
    {
        return $this->province;
    }

    public function setProvince(Province $province): void
    {
        $this->province = $province;
    }

    public function getCity(): City
    {
        return $this->city;
    }

    public function setCity(City $city): void
    {
        $this->city = $city;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
