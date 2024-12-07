<?php

namespace App\Domain\Entity;

use App\Domain\Repository\UserEducationRepository;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

#[Entity(repository: UserEducationRepository::class, table: 'user_educations')]
class UserEducation
{
    #[Column(type: "primary")]
    private int $id;
    #[BelongsTo(target: User::class)]
    private User $user;
    #[Column(type: "string")]
    private string $university;
    #[BelongsTo(target: Degree::class)]
    private Degree $degree;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $createdAt;
    #[Column(type: 'datetime')]
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

    public function getUniversity(): string
    {
        return $this->university;
    }

    public function setUniversity(string $university): void
    {
        $this->university = $university;
    }

    public function getDegree(): Degree
    {
        return $this->degree;
    }

    public function setDegree(Degree $degree): void
    {
        $this->degree = $degree;
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
