<?php

namespace App\Repository;

use App\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;

class UserRepository
{
    public function __construct(private ORMInterface $orm){}

    public function create(string $mobile, string $password): User
    {

        $user = new User();
        $user->setMobile($mobile);
        $user->setPassword($password);

        $tr = new EntityManager($this->orm);
        $tr->persist($user);
        $tr->run();

        return $user;
    }
}
