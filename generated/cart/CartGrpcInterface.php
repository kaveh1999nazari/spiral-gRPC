<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: cart.proto

namespace GRPC\cart;

use Spiral\RoadRunner\GRPC;

interface CartGrpcInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "cart.CartGrpc";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param CartCreateRequest $in
    * @return CartCreateResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function CartCreate(GRPC\ContextInterface $ctx, CartCreateRequest $in): CartCreateResponse;
}
