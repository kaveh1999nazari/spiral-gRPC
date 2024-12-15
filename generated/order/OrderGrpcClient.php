<?php

declare(strict_types=1);

namespace GRPC\order;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class OrderGrpcClient implements OrderGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function OrderCreate(ContextInterface $ctx, OrderCreateRequest $in): OrderCreateResponse
    {
        [$response, $status] = $this->core->callAction(OrderGrpcInterface::class, '/'.self::NAME.'/OrderCreate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\order\OrderCreateResponse::class,
        ]);

        return $response;
    }

    public function OrderUpdate(ContextInterface $ctx, OrderUpdateRequest $in): OrderUpdateResponse
    {
        [$response, $status] = $this->core->callAction(OrderGrpcInterface::class, '/'.self::NAME.'/OrderUpdate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\order\OrderUpdateResponse::class,
        ]);

        return $response;
    }

    public function OrderList(ContextInterface $ctx, OrderListRequest $in): OrderListResponse
    {
        [$response, $status] = $this->core->callAction(OrderGrpcInterface::class, '/'.self::NAME.'/OrderList', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\order\OrderListResponse::class,
        ]);

        return $response;
    }
}
