<?php

namespace App\Domain\Entity;


use App\Domain\Repository\UserJobRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: UserJobRepository::class, table: 'user_jobs')]
class UserJob
{
    #[Column(type: "primary")]
    private int $id;
    #[BelongsTo(target: User::class)]
    private User $user;
    #[BelongsTo(target: Province::class)]
    private Province $province;
    #[BelongsTo(target: City::class)]
    private City $city;
    #[Column(type: "string")]
    private string $title;
    #[Column(type: "string")]
    private string $phone;
    #[Column(type: "string")]
    private string $postalCode;
    #[Column(type: "string")]
    private string $address;
    #[Column(type: "float")]
    private float $monthlySalary;
    #[Column(type: "integer")]
    private int $workExperienceDuration;
    #[Column(type: "string")]
    private string $workType;
    #[Column(type: "string")]
    private string $contractType;
    #[Column(type: "datetime")]
    private \DateTimeImmutable $createdAt;
    #[Column(type: "datetime")]
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getMonthlySalary(): float
    {
        return $this->monthlySalary;
    }

    public function setMonthlySalary(float $monthlySalary): void
    {
        $this->monthlySalary = $monthlySalary;
    }

    public function getWorkExperienceDuration(): int
    {
        return $this->workExperienceDuration;
    }

    public function setWorkExperienceDuration(int $workExperienceDuration): void
    {
        $this->workExperienceDuration = $workExperienceDuration;
    }

    public function getWorkType(): string
    {
        return $this->workType;
    }

    public function setWorkType(string $workType): void
    {
        $this->workType = $workType;
    }

    public function getContractType(): string
    {
        return $this->contractType;
    }

    public function setContractType(string $contractType): void
    {
        $this->contractType = $contractType;
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
