<?php

namespace App\Endpoint\RPC;

use App\Domain\Entity\City;
use App\Domain\Entity\Degree;
use App\Domain\Entity\Province;
use App\Domain\Entity\User;
use App\Domain\Entity\UserEducation;
use App\Domain\Entity\UserJob;
use App\Domain\Entity\UserResident;
use App\Domain\Request\UserLoginEmailRequest;
use App\Domain\Request\UserLoginMobileRequest;
use App\Domain\Request\UserLoginOTPRequest;
use App\Domain\Request\UserRegisterEducationRequest;
use App\Domain\Request\UserRegisterJobRequest;
use App\Domain\Request\UserRegisterRequest;
use App\Domain\Attribute\ValidateBy;
use App\Domain\Request\UserRegisterResidentRequest;
use App\Domain\Request\UserUpdateRequest;
use App\Domain\Request\UserUpdateResidentRequest;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\user\LoginEmailRequest;
use GRPC\user\LoginEmailResponse;
use GRPC\user\LoginMobileRequest;
use GRPC\user\LoginMobileResponse;
use GRPC\user\LoginOTPRequest;
use GRPC\user\LoginOTPResponse;
use GRPC\user\RegisterUserEducationRequest;
use GRPC\user\RegisterUserEducationResponse;
use GRPC\user\RegisterUserJobRequest;
use GRPC\user\RegisterUserJobResponse;
use GRPC\user\RegisterUserRequest;
use GRPC\user\RegisterUserResidentRequest;
use GRPC\user\RegisterUserResidentResponse;
use GRPC\user\RegisterUserResponse;
use GRPC\user\UpdateUserRequest;
use GRPC\user\UpdateUserResidentRequest;
use GRPC\user\UpdateUserResidentResponse;
use GRPC\user\UpdateUserResponse;
use GRPC\user\UserGrpcInterface;
use Spiral\Auth\TokenStorageInterface;
use Spiral\Mailer\MailerInterface;
use Spiral\Mailer\Message;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class UserService implements UserGrpcInterface
{
    public function __construct(
        protected readonly ORMInterface        $orm,
        private readonly TokenStorageInterface $tokens,
        private readonly MailerInterface       $mailer,
    )
    {
    }

    #[ValidateBy(UserRegisterRequest::class)]
    public function RegisterUser(GRPC\ContextInterface $ctx, RegisterUserRequest $in): RegisterUserResponse
    {
        $firstName = $in->getFirstName();
        $lastName = $in->getLastName();
        $email = $in->getEmail();
        $mobile = $in->getMobile();
        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);
        $fatherName = $in->getFatherName() ?? null;
        $nationalCode = $in->getNationalCode();
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

        if ($user->getEmail()) {
            $this->sendWelcomeEmail($user->getFirstName(), $user->getLastName(), $user->getEmail());
        }

        $response = new RegisterUserResponse();
        $response->setId($user->getId());
        $response->setMessage("successfully account:{$mobile} created");
        return $response;
    }

    #[ValidateBy(UserRegisterResidentRequest::class)]
    public function RegisterUserResident(GRPC\ContextInterface $ctx, RegisterUserResidentRequest $in): RegisterUserResidentResponse
    {
        $userId = $in->getUser();
        $address = $in->getAddress();
        $postalCode = $in->getPostalCode();
        $provinceId = $in->getProvince();
        $cityId = $in->getCity();

        $user = $this->orm->getRepository(User::class)
            ->findByPK($userId);
        $province = $this->orm->getRepository(Province::class)
            ->findByPK($provinceId);
        $city = $this->orm->getRepository(City::class)
            ->findByPK($cityId);

        $userResident = $this->orm->getRepository(UserResident::class)
            ->create($user, $address,
                $postalCode, $province, $city);

        $response = new RegisterUserResidentResponse();
        $response->setId($user->getId());
        $response->setMessage("User Resident account: {$user->getMobile()} successfully create");

        return $response;
    }

    #[ValidateBy(UserRegisterEducationRequest::class)]
    public function RegisterUserEducation(GRPC\ContextInterface $ctx, RegisterUserEducationRequest $in): RegisterUserEducationResponse
    {
        $userId = $in->getUser();
        $university = $in->getUniversity();
        $degreeId = $in->getDegree();

        $user = $this->orm->getRepository(User::class)
            ->findByPK($userId);
        $degree = $this->orm->getRepository(Degree::class)
            ->findByPK($degreeId);

        $userEducation = $this->orm->getRepository(UserEducation::class)
            ->create($user, $university, $degree);

        $response = new RegisterUserEducationResponse();
        $response->setId($user->getId());
        $response->setMessage("User Education account: {$user->getMobile()} successfully create");

        return $response;

    }

    #[ValidateBy(UserRegisterJobRequest::class)]
    public function RegisterUserJob(GRPC\ContextInterface $ctx, RegisterUserJobRequest $in): RegisterUserJobResponse
    {
        $userId = $in->getUser();
        $provinceId = $in->getProvince();
        $cityId = $in->getCity();
        $title = $in->getTitle();
        $phone = $in->getPhone();
        $postalCode = $in->getPostalCode();
        $address = $in->getAddress();
        $monthlySalary = $in->getMonthlySalary();
        $workExperienceDuration = $in->getWorkExperienceDuration();
        $workType = $in->getWorkType();
        $contractType = $in->getContractType();

        $user = $this->orm->getRepository(User::class)
            ->findByPK($userId);
        $province = $this->orm->getRepository(Province::class)
            ->findByPK($provinceId);
        $city = $this->orm->getRepository(City::class)
            ->findByPK($cityId);

        $userJob = $this->orm->getRepository(UserJob::class)
            ->create($user, $province, $city, $title,
                $phone, $postalCode, $address, $monthlySalary,
                $workExperienceDuration, $workType, $contractType);

        $response = new RegisterUserJobResponse();
        $response->setId($user->getId());
        $response->setMessage("User Job account: {$user->getMobile()} successfully create");

        return $response;

    }

    #[ValidateBy(UserUpdateRequest::class)]
    public function UpdateUser(GRPC\ContextInterface $ctx, UpdateUserRequest $in): UpdateUserResponse
    {
        $userId = $in->getUser();
        $user = $this->orm->getRepository(User::class)
            ->findByPK($userId);
        if (!$user) {
            return throw new GRPCException(
                message: "User Not Find",
                code: Code::NOT_FOUND
            );
        }

        $firstName = $in->getFirstName();
        $lastName = $in->getLastName();
        $email = $in->getEmail();
        $mobile = $in->getMobile();
        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);
        $fatherName = $in->getFatherName();
        $nationalCode = $in->getNationalCode();
        $birthDateString = $in->getBirthDate();

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
        $code = $in->getCode();
        if ($code === $user->getOtpCode() && $user->getOtpExpiredAt() > new \DateTimeImmutable()) {
            $users = $this->orm->getRepository(User::class)
                ->update($userId, $firstName ?: null, $lastName ?: null,
                    $mobile ?: null, $email ?: null, $password ?: null,
                    $fatherName ?: null, $nationalCode ?: null, $birthDate ?: null);

            $response = new UpdateUserResponse();
            $response->setMessage("update account : {$users->getMobile()} successfully");

            return $response;

        } else {
            throw new GRPCException(
                message: "your code is invalid or expired!",
                code: Code::UNAUTHENTICATED
            );
        }
    }

    #[ValidateBy(UserUpdateResidentRequest::class)]
    public function UpdateUserResident(GRPC\ContextInterface $ctx, UpdateUserResidentRequest $in): UpdateUserResidentResponse
    {
        $id = $in->getId();
        $userId = $in->getUser();
        $address = $in->getAddress();
        $postalCode = $in->getPostalCode();
        $provinceId = $in->getProvince();
        $cityId = $in->getCity();

        $user = $this->orm->getRepository(UserResident::class)
            ->findOne(['user_id' => $userId]);
        if (!$user) {
            throw new GRPCException(
                message: "Not Found User!", code: Code::NOT_FOUND
            );
        }

        $province = $this->orm->getRepository(Province::class)
            ->findByPK($provinceId);
        $city = $this->orm->getRepository(City::class)
            ->findByPK($cityId);

        $code = $in->getCode();
        if ($code && $code === $user->getUser()->getOtpCode() && $user->getUser()->getOtpExpiredAt() > new \DateTimeImmutable())
        {
            $userResident = $this->orm->getRepository(UserResident::class)
                ->update($id, $address ?: null, $postalCode ?: null,
                    $province ?: null, $city ?: null);

            $response = new UpdateUserResidentResponse();
            $response->setMessage("update account : {$user->getUser()->getMobile()} resident's successfully");

            return $response;

        }else{
            throw new GRPCException(
                message: "Code is Invalid or expired!",code: Code::UNAUTHENTICATED
            );
        }

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

        $user = $this->orm->getRepository(User::class)
            ->findOne(['email' => $email]);

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

        $user = $this->orm->getRepository(User::class)
            ->findOne(['email' => $email]);

        $response = new LoginOTPResponse();

        if ($user && $code === $user->getOtpCode() && $user->getOtpExpiredAt() > new \DateTimeImmutable()) {
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
