<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product.proto

namespace GRPC\product\GPBMetadata;

class Product
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
product.protoproduct"�
productCreateRequest
name (	
description (	
brand (	
image (	
in_stock (	
category_id (
price (	;
options (2*.product.productCreateRequest.OptionsEntryC
OptionsEntry
key ("
value (2.product.OptionList:8"1
productCreateResponse

id (
name (	"

OptionList
values (	"$
productSearchRequest
name (	">
productSearchResponse%
result (2.product.product_name"
product_name
name (	2�
ProductGrpcN
ProductCreate.product.productCreateRequest.product.productCreateResponseN
ProductSearch.product.productSearchRequest.product.productSearchResponseB*�GRPC\\product�GRPC\\product\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

