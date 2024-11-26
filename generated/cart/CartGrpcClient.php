<?php

declare(strict_types=1);

namespace GRPC\cart;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class CartGrpcClient implements CartGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function CartCreate(ContextInterface $ctx, CartCreateRequest $in): CartCreateResponse
    {
        [$response, $status] = $this->core->callAction(CartGrpcInterface::class, '/'.self::NAME.'/CartCreate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\cart\CartCreateResponse::class,
        ]);

        return $response;
    }
}
