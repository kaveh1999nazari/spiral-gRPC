<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Degree;
use App\Domain\Entity\User;
use App\Domain\Entity\UserEducation;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class UserEducationRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(User $user, string $university, Degree $degree): UserEducation
    {
        $userEducation = new UserEducation();
        $userEducation->setUser($user);
        $userEducation->setUniversity($university);
        $userEducation->setDegree($degree);
        $userEducation->setCreatedAt(new \DateTimeImmutable());
        $userEducation->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($userEducation);
        $this->entityManager->run();

        return $userEducation;

    }

}
