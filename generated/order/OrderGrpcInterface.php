<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: order.proto

namespace GRPC\order;

use Spiral\RoadRunner\GRPC;

interface OrderGrpcInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "order.OrderGrpc";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param OrderCreateRequest $in
    * @return OrderCreateResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function OrderCreate(GRPC\ContextInterface $ctx, OrderCreateRequest $in): OrderCreateResponse;
}