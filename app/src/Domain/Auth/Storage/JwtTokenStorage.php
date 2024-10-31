<?php

namespace App\Domain\Auth\Storage;

use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Spiral\Auth\TokenInterface;
use Spiral\Auth\TokenStorageInterface;

final class JwtTokenStorage implements TokenStorageInterface
{
    /** @var callable */
    private $time;

    public function __construct(
        private readonly string $secret,
        private string $algorithm = 'HS256',
        private readonly string $expiresAt = '+30 days',
        callable $time = null
    ) {
        $this->time = $time ?? static function (string $offset): \DateTimeImmutable {
            return new \DateTimeImmutable($offset);
        };
    }

    public function load(string $id): ?TokenInterface
    {
        try {
            $token = (array) JWT::decode($id, new Key($this->secret, $this->algorithm));
        } catch (ExpiredException $exception) {
            throw $exception;
        } catch (\Throwable $exception) {
            return null;
        }

        if (
            false === isset($token['data'])
            || false === isset($token['iat'])
            || false === isset($token['exp'])
        ) {
            return null;
        }

        return new Token(
            $id,
            $token,
            (array) $token['data'],
            (new \DateTimeImmutable())->setTimestamp($token['iat']),
            (new \DateTimeImmutable())->setTimestamp($token['exp'])
        );
    }

    public function create(array $payload, \DateTimeInterface $expiresAt = null): TokenInterface
    {
        $issuedAt = ($this->time)('now');
        $expiresAt = $expiresAt ?? ($this->time)($this->expiresAt);
        $token = [
            'iat' => $issuedAt->getTimestamp(),
            'exp' => $expiresAt->getTimestamp(),
        ];
        $token = array_merge($token, $payload);

        return new Token(
            JWT::encode($token,$this->secret,$this->algorithm),
            $token,
            $payload,
            $issuedAt,
            $expiresAt
        );
    }

    public function delete(TokenInterface $token): void
    {
        // We don't need to do anything here since JWT tokens are self-contained.
    }
}
