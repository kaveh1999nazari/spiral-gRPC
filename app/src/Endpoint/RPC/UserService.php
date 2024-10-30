<?php

namespace App\Endpoint\RPC;

use App\Attribute\ValidateBy;
use App\Entity\User;
use App\Request\UserLoginRequest;
use App\Request\UserRegisterRequest;
use Cycle\ORM\ORMInterface;
use Firebase\JWT\JWT;
use GRPC\User\LoginReq;
use GRPC\User\LoginRes;
use GRPC\User\RegisterReq;
use GRPC\User\UserGrpcInterface;
use Spiral\Auth\AuthContextInterface;
use Spiral\Auth\TokenInterface;
use Spiral\Auth\TokenStorageInterface;
use Spiral\RoadRunner\GRPC;
use GRPC\User\RegisterRes;

class UserService implements UserGrpcInterface
{
    private $secrectKey = "your_key";
    public function __construct(
        protected readonly ORMInterface $orm,
        private readonly AuthContextInterface $auth,
        private readonly TokenStorageInterface $tokens
    ){}

    #[ValidateBy(UserRegisterRequest::class)]
    public function Register(GRPC\ContextInterface $ctx, RegisterReq $in): RegisterRes
    {
        $mobile = $in->getMobile();
        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);

        $user = $this->orm->getRepository(User::class)
            ->create($mobile, $password);

        $res = new RegisterRes();
        $res->setId($user->getId());
        return $res;
    }

    #[ValidateBy(UserLoginRequest::class)]
    public function Login(GRPC\ContextInterface $ctx, LoginReq $in): LoginRes
    {
        $mobile = $in->getMobile();
        $password = $in->getPassword();

        print_r($mobile);

        $user = $this->orm->getRepository(User::class)
            ->findByMobile($mobile);

        if ($user && password_verify($password, $user->getPassword()))
        {
            $token = $this->tokens->create(['sub' => $user->getId()]);

            print_r($token->getToken());

            $response = new LoginRes();
            $response->setToken($token->getID());
            return $response;
        }
        $response = new LoginRes();
        $response->setMessage("Authentication failed.");
        return $response;

    }
}
