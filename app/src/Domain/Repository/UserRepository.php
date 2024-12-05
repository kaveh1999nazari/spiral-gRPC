<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class UserRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(?string $firstName, ?string $lastName,
                           string $mobile, string $email,
                           string $password, ?string $fatherName,
                           ?string $nationalCode, ?\DateTimeImmutable $birthDate): User
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
