<?php

namespace App\Endpoint\RPC;

use App\Domain\Entity\User;
use App\Domain\Request\UserLoginRequest;
use App\Domain\Request\UserRegisterRequest;
use App\Domain\Attribute\ValidateBy;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\user\LoginMobileRequest;
use GRPC\user\LoginMobileResponse;
use GRPC\user\RegisterUserRequest;
use GRPC\user\RegisterUserResponse;
use GRPC\user\UserGrpcInterface;
use Spiral\Auth\TokenStorageInterface;
use Spiral\RoadRunner\GRPC;

class UserService implements UserGrpcInterface
{
    public function __construct(
        protected readonly ORMInterface $orm,
        private readonly TokenStorageInterface $tokens
    ){}

    #[ValidateBy(UserRegisterRequest::class)]
    public function Register(GRPC\ContextInterface $ctx, RegisterUserRequest $in): RegisterUserResponse
    {
        $firstName = $in->getFirstName() ?? null;
        $lastName = $in->getLastName() ?? null;
        $email = $in->getEmail() ?? null;
        $mobile = $in->getMobile();
        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);
        $fatherName = $in->getFatherName() ?? null;
        $nationalCode = $in->getNationalCode() ?? null;
        $birthDateString = $in->getBirthDate() ?? null;

        $birthDate = null;
        if ($birthDateString) {
            $birthDate = \DateTimeImmutable::createFromFormat('Y-m-d', $birthDateString);
            if (!$birthDate || $birthDate->format('Y-m-d') !== $birthDateString) {
                throw new GRPC\Exception\GRPCException(
                    message: "Invalid birth date format. Expected format: YYYY-MM-DD.",
                    code: Code::OUT_OF_RANGE
                );
            }
        }


        $user = $this->orm->getRepository(User::class)
            ->create($firstName, $lastName, $mobile, $email, $password,
                     $fatherName, $nationalCode, $birthDate);

        $response = new RegisterUserResponse();
        $response->setId($user->getId());
        $response->setMessage("successfully account:{$mobile} created");
        return $response;
    }

    #[ValidateBy(UserLoginRequest::class)]
    public function LoginByMobile(GRPC\ContextInterface $ctx, LoginMobileRequest $in): LoginMobileResponse
    {
        $mobile = $in->getMobile();
        $password = $in->getPassword();

        /** @var User $user */
        $user = $this->orm->getRepository(User::class)
            ->findByMobile($mobile);

        if ($user && password_verify($password, $user->getPassword()))
        {
            $token = $this->tokens->create(['sub' => $user->getId()]);
            $response = new LoginMobileResponse();
            $response->setToken($token->getID());
            $response->setMessage($user->getRoles());
            return $response;
        }
        $response = new LoginMobileResponse();
        $response->setMessage(["Authentication failed."]);
        return $response;

    }
}
