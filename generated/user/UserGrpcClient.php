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

    public function Register(ContextInterface $ctx, RegisterUserRequest $in): RegisterUserResponse
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/Register', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\user\RegisterUserResponse::class,
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
}
