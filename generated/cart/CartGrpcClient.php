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

    public function CartList(ContextInterface $ctx, CartListRequest $in): CartListResponse
    {
        [$response, $status] = $this->core->callAction(CartGrpcInterface::class, '/'.self::NAME.'/CartList', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\cart\CartListResponse::class,
        ]);

        return $response;
    }

    public function CartDelete(ContextInterface $ctx, CartDeleteRequest $in): CartDeleteResponse
    {
        [$response, $status] = $this->core->callAction(CartGrpcInterface::class, '/'.self::NAME.'/CartDelete', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\cart\CartDeleteResponse::class,
        ]);

        return $response;
    }
}
