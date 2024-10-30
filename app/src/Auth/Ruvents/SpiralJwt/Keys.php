<?php

declare(strict_types=1);

namespace App\Auth\Ruvents\SpiralJwt;

final class Keys
{
    public function __construct(private string $privateKey, private ?string $publicKey = null) {
    }

    public function getPrivateKey(): string
    {
        return $this->privateKey;
    }

    public function getPublicKey(): ?string
    {
        return $this->publicKey;
    }

    public function isSymmetric(): bool
    {
        return $this->publicKey === null;
    }
}
