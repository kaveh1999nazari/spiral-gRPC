<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: user.proto

namespace GRPC\user\GPBMetadata;

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
�

user.protouser"�
RegisterUserRequest

first_name (	
	last_name (	
mobile (	
email (	
password (	
father_name (	


birth_date (	"3
RegisterUserResponse

id (
message (	"6
LoginMobileRequest
mobile (	
password (	"5
LoginMobileResponse
token (	
message (	"4
LoginEmailRequest
email (	
password (	"4
LoginEmailResponse
token (	
message (	2�
UserGrpcA
Register.user.RegisterUserRequest.user.RegisterUserResponseD

LoginByEmail.user.LoginEmailRequest.user.LoginEmailResponseB$�	GRPC\\user�GRPC\\user\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}
