<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\ValidateBy;
use App\Domain\Entity\City;
use App\Domain\Entity\Degree;
use App\Domain\Entity\Media;
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
use App\Domain\Request\UserRegisterResidentRequest;
use App\Domain\Request\UserUpdateRequest;
use App\Domain\Request\UserUpdateResidentRequest;
use App\Endpoint\Job\SendLoginNotificationEmailJob;
use App\Endpoint\Job\SendWelcomeEmailJob;
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
use Spiral\Queue\QueueInterface;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class UserService implements UserGrpcInterface
{
    public function __construct(
        protected readonly ORMInterface        $orm,
        private readonly TokenStorageInterface $tokens,
        private readonly QueueInterface $queue,
    )
    {
    }

    #[ValidateBy(UserRegisterRequest::class)]
    public function RegisterUser(GRPC\ContextInterface $ctx, RegisterUserRequest $in): RegisterUserResponse
    {
        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);

        if ($in->getBirthDate()) {
            $birthDate = \DateTimeImmutable::createFromFormat('Y-m-d', $in->getBirthDate());
        }

        $user = $this->orm->getRepository(User::class)
            ->create($in->getFirstName(), $in->getLastName(), $in->getMobile(), $in->getEmail(), $password,
                $in->getFatherName(), $in->getNationalCode(), $birthDate);

        if ($in->getPicture()){
            $imageName = substr($in->getPicture(), 26);
            $this->uploadMedia('user',
                $user->getId(),
                $imageName,
                $in->getPicture());
        }


        if ($user->getEmail()) {
            $this->queue->push(SendWelcomeEmailJob::class, [
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
            ]);
        }

        $response = new RegisterUserResponse();
        $response->setId($user->getId());
        $response->setMessage("successfully account:{$user->getMobile()} created");
        return $response;
    }

    #[ValidateBy(UserRegisterResidentRequest::class)]
    public function RegisterUserResident(GRPC\ContextInterface $ctx, RegisterUserResidentRequest $in): RegisterUserResidentResponse
    {
        $user = $this->orm->getRepository(User::class)
            ->findByPK($in->getUser());
        $province = $this->orm->getRepository(Province::class)
            ->findByPK($in->getProvince());
        $city = $this->orm->getRepository(City::class)
            ->findByPK($in->getCity());

        $this->orm->getRepository(UserResident::class)
            ->create($user,
                $in->getAddress(),
                $in->getPostalCode(),
                $province,
                $city);

        if ($in->getPostalCodeFile()){
            $name = substr($in->getPostalCodeFile(), 26);
            $this->uploadMedia('userResident',
                    $user->getId(),
                    $name,
                    $in->getPostalCodeFile());
        }

        $response = new RegisterUserResidentResponse();
        $response->setId($user->getId());
        $response->setMessage("User Resident account: {$user->getMobile()} successfully create");

        return $response;
    }

    #[ValidateBy(UserRegisterEducationRequest::class)]
    public function RegisterUserEducation(GRPC\ContextInterface $ctx, RegisterUserEducationRequest $in): RegisterUserEducationResponse
    {
        $user = $this->orm->getRepository(User::class)
            ->findByPK($in->getUser());
        $degree = $this->orm->getRepository(Degree::class)
            ->findByPK($in->getDegree());

        $this->orm->getRepository(UserEducation::class)
            ->create($user, $in->getUniversity(), $degree);

        if ($in->getEducationFile()){
            $name = substr($in->getEducationFile(), 26);
            $this->uploadMedia('userEducation',
                $user->getId(),
                $name,
                $in->getEducationFile());
        }

        $response = new RegisterUserEducationResponse();
        $response->setId($user->getId());
        $response->setMessage("User Education account: {$user->getMobile()} successfully create");

        return $response;

    }

    #[ValidateBy(UserRegisterJobRequest::class)]
    public function RegisterUserJob(GRPC\ContextInterface $ctx, RegisterUserJobRequest $in): RegisterUserJobResponse
    {
        $user = $this->orm->getRepository(User::class)
            ->findByPK($in->getUser());
        $province = $this->orm->getRepository(Province::class)
            ->findByPK($in->getProvince());
        $city = $this->orm->getRepository(City::class)
            ->findByPK($in->getCity());

        $this->orm->getRepository(UserJob::class)
            ->create($user, $province, $city, $in->getTitle(),
                $in->getPhone(), $in->getPostalCode(), $in->getAddress(), $in->getMonthlySalary(),
                $in->getWorkExperienceDuration(), $in->getWorkType(), $in->getContractType());

        $response = new RegisterUserJobResponse();
        $response->setId($user->getId());
        $response->setMessage("User Job account: {$user->getMobile()} successfully create");

        return $response;

    }

    #[ValidateBy(UserUpdateRequest::class)]
    public function UpdateUser(GRPC\ContextInterface $ctx, UpdateUserRequest $in): UpdateUserResponse
    {
        $user = $this->orm->getRepository(User::class)
            ->findByPK($in->getUser());
        if (!$user) {
            return throw new GRPCException(
                message: "User Not Found",
                code: Code::NOT_FOUND
            );
        }

        $password = password_hash($in->getPassword(), PASSWORD_BCRYPT);

        if ($in->getBirthDate()) {
            $birthDate = \DateTimeImmutable::createFromFormat('Y-m-d', $in->getBirthDate());
        }

        if ($in->getCode() === $user->getOtpCode() && $user->getOtpExpiredAt() > new \DateTimeImmutable()) {
            $this->orm->getRepository(User::class)
                ->update($user->getId(), $in->getFirstName() ?: null, $in->getLastName() ?: null,
                    $in->getMobile() ?: null, $in->getEmail() ?: null, $password ?: null,
                    $in->getFatherName() ?: null, $in->getNationalCode() ?: null, $birthDate ?: null);

            if ($in->getPicture()){
                $name = substr($in->getPicture(), 26);
                $this->uploadMedia('user',
                    $user->getId(),
                    $name,
                    $in->getPicture());
            }

            $response = new UpdateUserResponse();
            $response->setMessage("update account : {$user->getMobile()} successfully");

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
        $user = $this->orm->getRepository(UserResident::class)
            ->findOne(['user_id' => $in->getUser()]);
        if (!$user) {
            throw new GRPCException(
                message: "Not Found User!", code: Code::NOT_FOUND
            );
        }

        $province = $this->orm->getRepository(Province::class)
            ->findByPK($in->getProvince());
        $city = $this->orm->getRepository(City::class)
            ->findByPK($in->getCity());

        if ($in->getCode() && $in->getCode() === $user->getUser()->getOtpCode() && $user->getUser()->getOtpExpiredAt() > new \DateTimeImmutable())
        {
            $this->orm->getRepository(UserResident::class)
                ->update($in->getId(), $in->getAddress() ?: null, $in->getPostalCode() ?: null,
                    $province ?: null, $city ?: null);

            if ($in->getPostalCodeFile()){
                $name = substr($in->getPostalCodeFile(), 26);
                $this->uploadMedia('UserResident',
                    $user->getId(),
                    $name,
                    $in->getPostalCodeFile());
            }

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
        /** @var User $user */
        $user = $this->orm->getRepository(User::class)
            ->findByMobile($in->getMobile());

        $response = new LoginMobileResponse();

        if ($user && password_verify($in->getPassword(), $user->getPassword())) {
            $token = $this->tokens->create(['sub' => $user->getId()]);
            $response->setToken($token->getID());
            $response->setMessage($user->getRoles());
            $this->queue->push(SendLoginNotificationEmailJob::class, [
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
            ]);
            return $response;
        } else {
            $response->setMessage(["Authentication failed."]);

        }

        return $response;

    }

    #[ValidateBy(UserLoginEmailRequest::class)]
    public function LoginByEmail(GRPC\ContextInterface $ctx, LoginEmailRequest $in): LoginEmailResponse
    {
        $user = $this->orm->getRepository(User::class)
            ->findOne(['email' => $in->getEmail()]);

        $response = new LoginEmailResponse();

        if ($user && password_verify($in->getPassword(), $user->getPassword())) {
            $token = $this->tokens->create(['sub' => $user->getId()]);
            $response->setMessage($user->getRoles());
            $response->setToken($token->getID());
            $this->queue->push(SendLoginNotificationEmailJob::class, [
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
            ]);
        } else {
            $response->setMessage(["Authentication failed."]);
        }

        return $response;
    }

    #[ValidateBy(UserLoginOTPRequest::class)]
    public function LoginByOTP(GRPC\ContextInterface $ctx, LoginOTPRequest $in): LoginOTPResponse
    {
        $user = $this->orm->getRepository(User::class)
            ->findOne(['email' => $in->getEmail()]);

        $response = new LoginOTPResponse();

        if ($user && $in->getCode() === $user->getOtpCode() && $user->getOtpExpiredAt() > new \DateTimeImmutable()) {
            $token = $this->tokens->create(['sub' => $user->getId()]);
            $response->setMessage($user->getRoles());
            $response->setToken($token->getID());
            $this->queue->push(SendLoginNotificationEmailJob::class, [
                'firstName' => $user->getFirstName(),
                'lastName' => $user->getLastName(),
                'email' => $user->getEmail(),
            ]);
        } else {
            $response->setMessage(["Authentication failed."]);
        }

        return $response;
    }

    private function uploadMedia(string $entityName, int $entityId,
                                 string $imageName, string $imagePath)
    {
        $this->orm->getRepository(Media::class)
            ->upload($entityName, $entityId, $imageName, $imagePath);
    }

}
