<?php

declare(strict_types=1);

namespace GRPC\User;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class UserGrpcClient implements UserGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function createUser(ContextInterface $ctx, RegisterReq $in): RegisterRes
    {
        [$response, $status] = $this->core->callAction(UserGrpcInterface::class, '/'.self::NAME.'/createUser', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\User\RegisterRes::class,
        ]);

        return $response;
    }
}
