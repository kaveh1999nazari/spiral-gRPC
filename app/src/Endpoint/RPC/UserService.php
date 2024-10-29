<?php

namespace App\Endpoint\RPC;

use App\Attribute\ValidateBy;
use App\Repository\UserRepository;
use App\Request\UserRegisterRequest;
use GRPC\User\RegisterReq;
use GRPC\User\UserGrpcInterface;
use Spiral\RoadRunner\GRPC;
use GRPC\User\RegisterRes;

class UserService implements UserGrpcInterface
{
    public function __construct(
        protected readonly UserRepository $userRepository
    ){}

    #[ValidateBy(UserRegisterRequest::class)]
    public function Register(GRPC\ContextInterface $ctx, RegisterReq $in): RegisterRes
    {
        $mobile = $in->getMobile();
        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);

        $user = $this->userRepository->create($mobile, $password);

        $res = new RegisterRes();
        $res->setId($user->getId());
        return $res;
    }
}
