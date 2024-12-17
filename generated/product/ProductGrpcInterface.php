<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: product.proto

namespace GRPC\product;

use Spiral\RoadRunner\GRPC;

interface ProductGrpcInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "product.ProductGrpc";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param ProductCreateRequest $in
    * @return ProductCreateResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function ProductCreate(GRPC\ContextInterface $ctx, ProductCreateRequest $in): ProductCreateResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param ProductSearchRequest $in
    * @return ProductSearchResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function ProductSearch(GRPC\ContextInterface $ctx, ProductSearchRequest $in): ProductSearchResponse;
}
