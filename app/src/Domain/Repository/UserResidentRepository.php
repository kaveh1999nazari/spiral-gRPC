<?php

namespace App\Domain\Repository;

use App\Domain\Entity\City;
use App\Domain\Entity\Province;
use App\Domain\Entity\User;
use App\Domain\Entity\UserResident;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class UserResidentRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(User $user, string $address, string $postalCode,
                           Province $province, City $city)
    {
        $userResident = new UserResident();
        $userResident->setUser($user);
        $userResident->setAddress($address);
        $userResident->setPostalCode($postalCode);
        $userResident->setProvince($province);
        $userResident->setCity($city);
        $userResident->setCreatedAt(new \DateTimeImmutable());
        $userResident->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($userResident);
        $this->entityManager->run();

        return $userResident;

    }

}
