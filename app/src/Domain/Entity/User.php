<?php

namespace App\Domain\Entity;

use App\Domain\Repository\UserRepository;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\HasMany;

#[Entity(repository: UserRepository::class, table: "users")]
class User
{
    #[Column(type: 'primary')]
    private int $id;
    #[Column(type: 'string')]
    private string $firstName;
    #[Column(type: 'string')]
    private string $lastName;
    #[Column(type: 'string')]
    private string $email;
    #[Column(type: 'string')]
    private string $mobile;
    #[Column(type: 'string')]
    private string $password;
    #[Column(type: 'string')]
    private string $fatherName;
    #[Column(type: 'string')]
    private string $nationalCode;
    #[Column(type: 'date')]
    private \DateTimeImmutable $birthDate;
    #[Column(type: 'json')]
    private string $roles;
    #[Column(type: 'datetime', default: 'now')]
    private \DateTimeImmutable $created_at;
    #[Column(type: 'datetime')]
    private \DateTimeImmutable $updated_at;
    #[Column(type: 'string', nullable: true)]
    private ?string $otpCode;
    #[Column(type: 'datetime', nullable: true)]
    private ?\DateTimeImmutable $otpExpiredAt;
    #[HasMany(target: Cart::class)]
    private array $cart;
    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

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

    public function getFatherName(): string
    {
        return $this->fatherName;
    }

    public function setFatherName(string $fatherName): void
    {
        $this->fatherName = $fatherName;
    }

    public function getNationalCode(): string
    {
        return $this->nationalCode;
    }

    public function setNationalCode(string $nationalCode): void
    {
        $this->nationalCode = $nationalCode;
    }

    public function getBirthDate(): \DateTimeImmutable
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeImmutable $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function getRoles(): array
    {
        return json_decode($this->roles, true);
    }

    public function setRoles(array $roles): void
    {
        $this->roles = json_encode($roles);
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $create_at): void
    {
        $this->created_at = $create_at;
    }

    public function getUpdatedAt(): \DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getOtpCode(): ?string
    {
        return $this->otpCode;
    }

    public function setOtpCode(?string $otpCode): void
    {
        $this->otpCode = $otpCode;
    }

    public function getOtpExpiredAt(): ?\DateTimeImmutable
    {
        return $this->otpExpiredAt;
    }

    public function setOtpExpiredAt(?\DateTimeImmutable $otpExpiredAt): void
    {
        $this->otpExpiredAt = $otpExpiredAt;
    }

    public function getCart(): array
    {
        return $this->cart;
    }

    public function setCart(array $cart): void
    {
        $this->cart = $cart;
    }

}
