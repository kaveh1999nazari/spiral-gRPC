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
�	

user.protouser"�
RegisterUserRequest

first_name (	
	last_name (	
mobile (	
email (	
password (	
father_name (	
national_code (	

birth_date (	"3
RegisterUserResponse

id (
message (	"q
RegisterUserResidentRequest
user (
address (	
postal_code (	
province (
city (";
RegisterUserResidentResponse

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
message (	".
LoginOTPRequest
email (	
code (	"2
LoginOTPResponse
token (	
message (	2�
UserGrpcE
RegisterUser.user.RegisterUserRequest.user.RegisterUserResponse]
RegisterUserResident!.user.RegisterUserResidentRequest".user.RegisterUserResidentResponseD
LoginByMobile.user.LoginMobileRequest.user.LoginMobileResponseA
LoginByEmail.user.LoginEmailRequest.user.LoginEmailResponse;

LoginByOTP.user.LoginOTPRequest.user.LoginOTPResponseB$�	GRPC\\user�GRPC\\user\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

