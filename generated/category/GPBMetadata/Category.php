<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: category.proto

namespace GRPC\category\GPBMetadata;

class Category
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
category.protocategory"%
categoryCreateRequest
name (	"$
categoryCreateResponse

id (2c
CategoryGrpcS
categoryCreate.category.categoryCreateRequest .category.categoryCreateResponseB,�GRPC\\category�GRPC\\category\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

