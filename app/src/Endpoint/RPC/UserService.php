<?php

namespace App\Endpoint\RPC;

use App\Repository\UserRepository;
use GRPC\User\RegisterReq;
use Spiral\RoadRunner\GRPC;
use GRPC\User\RegisterRes;

class UserService
{
    public function __construct(
        protected readonly UserRepository $userRepository
    ){}

    public function create(GRPC\ContextInterface $ctx, RegisterReq $in): RegisterRes
    {
        $mobile = $in->getMobile();
        $password = $in->getPassword();

        $user = $this->userRepository->create($mobile, $password);

        $res = new RegisterRes();
        $res->setId( $user->getId());
        return $res;
    }
}
