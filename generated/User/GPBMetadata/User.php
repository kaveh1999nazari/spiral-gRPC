<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: user.proto

namespace GRPC\User\GPBMetadata;

class User
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

user.protoUSER"/
RegisterReq
mobile (	
password (	"
RegisterRes

id (2>
UserGrpc2

createUser.USER.RegisterReq.USER.RegisterResB$�	GRPC\\User�GRPC\\User\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

