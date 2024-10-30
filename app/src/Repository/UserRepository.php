<?php

namespace App\Repository;

use App\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class UserRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(string $mobile, string $password): User
    {

        $user = new User();
        $user->setMobile($mobile);
        $user->setPassword($password);

        $this->entityManager->persist($user);
        $this->entityManager->run();

        return $user;
    }

    public function findByMobile(string $mobile): ?User
    {
        return $this->findOne(['mobile' => $mobile]);
    }
}
