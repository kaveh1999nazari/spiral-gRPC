<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: admin.proto

namespace GRPC\Admin\GPBMetadata;

class Admin
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
admin.protoAdmin"%
categoryCreateRequest
name (	"$
categoryCreateResponse

id (2Z
	AdminGrpcM
categoryCreate.Admin.categoryCreateRequest.Admin.categoryCreateResponseB&�
GRPC\\Admin�GRPC\\Admin\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}
