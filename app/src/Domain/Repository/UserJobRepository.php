<?php

namespace App\Domain\Repository;

use App\Domain\Entity\City;
use App\Domain\Entity\Province;
use App\Domain\Entity\User;
use App\Domain\Entity\UserJob;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class UserJobRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(User $user, Province $province, City $city, string $title, string $phone,
                           string $postalCode, string $address, float $monthlySalary , int $workExperienceDuration,
                           string $workType, string $contractType): UserJob
    {
        $userJob = new UserJob();
        $userJob->setUser($user);
        $userJob->setProvince($province);
        $userJob->setCity($city);
        $userJob->setTitle($title);
        $userJob->setPhone($phone);
        $userJob->setPostalCode($postalCode);
        $userJob->setAddress($address);
        $userJob->setMonthlySalary($monthlySalary);
        $userJob->setWorkExperienceDuration($workExperienceDuration);
        $userJob->setWorkType($workType);
        $userJob->setContractType($contractType);
        $userJob->setCreatedAt(new \DateTimeImmutable());
        $userJob->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($userJob);
        $this->entityManager->run();

        return $userJob;
    }

}
