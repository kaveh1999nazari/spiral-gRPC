<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: cart.proto

namespace GRPC\cart\GPBMetadata;

class Cart
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�

cart.protocart"O
cartCreateRequest
ProductPriceId (
number (

totalPrice (	">
cartCreateResponse

id (
userId (
uuid (	2K
CartGrpc?

CartCreate.cart.cartCreateRequest.cart.cartCreateResponseB$�	GRPC\\cart�GRPC\\cart\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

