<?php

declare(strict_types=1);

namespace GRPC\user;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class UserGrpcClient implements UserGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function RegisterUser(ContextInterface $ctx, RegisterUserRequest $in): RegisterUserResponse
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/RegisterUser', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\RegisterUserResponse::class,
        ]);

        return $response;
    }

    public function RegisterUserResident(
        ContextInterface $ctx,
        RegisterUserResidentRequest $in,
    ): RegisterUserResidentResponse {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/RegisterUserResident', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\RegisterUserResidentResponse::class,
        ]);

        return $response;
    }

    public function RegisterUserEducation(
        ContextInterface $ctx,
        RegisterUserEducationRequest $in,
    ): RegisterUserEducationResponse {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/RegisterUserEducation', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\RegisterUserEducationResponse::class,
        ]);

        return $response;
    }

    public function RegisterUserJob(ContextInterface $ctx, RegisterUserJobRequest $in): RegisterUserJobResponse
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/RegisterUserJob', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\RegisterUserJobResponse::class,
        ]);

        return $response;
    }

    public function UpdateUser(ContextInterface $ctx, UpdateUserRequest $in): UpdateUserResponse
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/UpdateUser', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\UpdateUserResponse::class,
        ]);

        return $response;
    }

    public function UpdateUserResident(
        ContextInterface $ctx,
        UpdateUserResidentRequest $in,
    ): UpdateUserResidentResponse {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/UpdateUserResident', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\UpdateUserResidentResponse::class,
        ]);

        return $response;
    }

    public function LoginByMobile(ContextInterface $ctx, LoginMobileRequest $in): LoginMobileResponse
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/LoginByMobile', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\LoginMobileResponse::class,
        ]);

        return $response;
    }

    public function LoginByEmail(ContextInterface $ctx, LoginEmailRequest $in): LoginEmailResponse
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/LoginByEmail', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\LoginEmailResponse::class,
        ]);

        return $response;
    }

    public function LoginByOTP(ContextInterface $ctx, LoginOTPRequest $in): LoginOTPResponse
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/LoginByOTP', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\LoginOTPResponse::class,
        ]);

        return $response;
    }
}
