<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;
use Google\Rpc\Code;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class UserRepository extends Repository
{
    public function __construct(Select                        $select, private readonly EntityManager $entityManager,
                                private readonly ORMInterface $ORM)
    {
        parent::__construct($select);
    }

    public function create(string $firstName, string $lastName,
                           string $mobile, string $email,
                           string $password, string $fatherName,
                           string $nationalCode, \DateTimeImmutable $birthDate): User
    {

        $user = new User();
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setMobile($mobile);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setFatherName($fatherName);
        $user->setNationalCode($nationalCode);
        $user->setBirthDate($birthDate);
        $user->setRoles(['user']);
        $user->setCreatedAt(new \DateTimeImmutable());
        $user->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($user);
        $this->entityManager->run();

        return $user;
    }

    public function update(int $userId, ?string $firstName, ?string $lastName,
                           ?string $mobile, ?string $email,
                           ?string $password, ?string $fatherName,
                           ?string $nationalCode, ?\DateTimeImmutable $birthDate): User
    {
        $user = $this->ORM->getRepository(User::class)->findByPK($userId);

        if ($firstName !== null) {
            $user->setFirstName($firstName);
        }
        if ($lastName !== null) {
            $user->setLastName($lastName);
        }
        if ($mobile !== null) {
            $user->setMobile($mobile);
        }
        if ($email !== null) {
            $user->setEmail($email);
        }
        if ($password !== null) {
            $user->setPassword($password);
        }
        if ($fatherName !== null) {
            $user->setFatherName($fatherName);
        }
        if ($nationalCode !== null) {
            $user->setNationalCode($nationalCode);
        }
        if ($birthDate !== null) {
            $user->setBirthDate($birthDate);
        }

        $user->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($user);
        $this->entityManager->run();

        return $user;

    }

    public function findByMobile(string $mobile): ?User
    {
        return $this->findOne(['mobile' => $mobile]);
    }

    public function setOtpForUser(User $user, int $otp, \DateTimeImmutable $expiration): void
    {
        $user->setOtpCode($otp);
        $user->setOtpExpiredAt($expiration);

        $this->entityManager->persist($user);
        $this->entityManager->run();
    }
}
