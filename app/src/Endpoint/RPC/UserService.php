<?php

namespace App\Endpoint\RPC;

use App\Domain\Entity\User;
use App\Domain\Request\UserLoginEmailRequest;
use App\Domain\Request\UserLoginMobileRequest;
use App\Domain\Request\UserLoginOTPRequest;
use App\Domain\Request\UserRegisterRequest;
use App\Domain\Attribute\ValidateBy;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\user\LoginEmailRequest;
use GRPC\user\LoginEmailResponse;
use GRPC\user\LoginMobileRequest;
use GRPC\user\LoginMobileResponse;
use GRPC\user\LoginOTPRequest;
use GRPC\user\LoginOTPResponse;
use GRPC\user\RegisterUserRequest;
use GRPC\user\RegisterUserResponse;
use GRPC\user\UserGrpcInterface;
use Spiral\Auth\TokenStorageInterface;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Spiral\RoadRunner\GRPC;

class UserService implements UserGrpcInterface
{
    public function __construct(
        protected readonly ORMInterface        $orm,
        private readonly TokenStorageInterface $tokens,
        private readonly MailerInterface $mailer,
    )
    {
    }

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

        if ($user->getEmail()){
            $this->sendWelcomeEmail($user->getFirstName(), $user->getLastName(), $user->getEmail());
        }

        $response = new RegisterUserResponse();
        $response->setId($user->getId());
        $response->setMessage("successfully account:{$mobile} created");
        return $response;
    }

    #[ValidateBy(UserLoginMobileRequest::class)]
    public function LoginByMobile(GRPC\ContextInterface $ctx, LoginMobileRequest $in): LoginMobileResponse
    {
        $mobile = $in->getMobile();
        $password = $in->getPassword();

        /** @var User $user */
        $user = $this->orm->getRepository(User::class)
            ->findByMobile($mobile);

        $response = new LoginMobileResponse();

        if ($user && password_verify($password, $user->getPassword())) {
            $token = $this->tokens->create(['sub' => $user->getId()]);
            $response->setToken($token->getID());
            $response->setMessage($user->getRoles());
            $this->sendLoginNotificationEmail($user->getFirstName(),
                $user->getLastName(),
                $user->getEmail());
            return $response;
        } else {
            $response->setMessage(["Authentication failed."]);

        }

        return $response;

    }

    #[ValidateBy(UserLoginEmailRequest::class)]
    public function LoginByEmail(GRPC\ContextInterface $ctx, LoginEmailRequest $in): LoginEmailResponse
    {
        $email = $in->getEmail();
        $password = $in->getPassword();

        $user = $this->orm->getRepository(User::class)->findOne(['email' => $email]);

        $response = new LoginEmailResponse();

        if ($user && password_verify($password, $user->getPassword())) {
            $token = $this->tokens->create(['sub' => $user->getId()]);
            $response->setMessage($user->getRoles());
            $response->setToken($token->getID());
            $this->sendLoginNotificationEmail($user->getFirstName(),
                $user->getLastName(),
                $user->getEmail());
        } else {
            $response->setMessage(["Authentication failed."]);
        }

        return $response;
    }

    #[ValidateBy(UserLoginOTPRequest::class)]
    public function LoginByOTP(GRPC\ContextInterface $ctx, LoginOTPRequest $in): LoginOTPResponse
    {
        $email = $in->getEmail();
        $code = $in->getCode();

        $user = $this->orm->getRepository(User::class)->findOne(['email' => $email]);

        $response = new LoginOTPResponse();

        if ($user && $code === $user->getOtpCode() && $user->getOtpExpiredAt() > new \DateTimeImmutable()) {
            $token = $this->tokens->create(['sub' => $user->getId()]);
            $response->setMessage($user->getRoles());
            $response->setToken($token->getID());
            $this->sendLoginNotificationEmail($user->getFirstName(),
                $user->getLastName(),
                $user->getEmail());
        }else{
            $response->setMessage(["Authentication failed."]);
        }

        return $response;
    }

    private function sendWelcomeEmail(?string $firstName, ?string $lastName, ?string $email)
    {
        $this->mailer->send(new Message(
            'emails/welcome.email.dark.php',
            $email,
            [
                'first_name' => $firstName,
                'last_name' => $lastName
            ]

        ));
    }

    private function sendLoginNotificationEmail(?string $firstName, ?string $lastName, ?string $email)
    {
        $this->mailer->send(new Message(
            'emails/login.email.dark.php',
            $email,
            [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'login_time' => date('Y-m-d H:i:s')
            ]

        ));
    }
}
