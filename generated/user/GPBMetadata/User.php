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
�

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
message (	"P
RegisterUserEducationRequest
user (

university (	
degree ("<
RegisterUserEducationResponse

id (
message (	"�
RegisterUserJobRequest
user (
province (
city (
title (	
phone (	
postal_code (	
address (	
monthly_salary ( 
work_experience_duration	 (
	work_type
 (	
contract_type (	"6
RegisterUserJobResponse

id (
message (	"�
UpdateUserRequest
user (

first_name (	
	last_name (	
mobile (	
email (	
password (	
father_name (	
national_code (	

birth_date	 (	
code
 (	"%
UpdateUserResponse
message (	"{
UpdateUserResidentRequest

id (
user (
address (	
postal_code (	
province (
city ("-
UpdateUserResidentResponse
message (	"6
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
message (	2�
UserGrpcE
RegisterUser.user.RegisterUserRequest.user.RegisterUserResponse]
RegisterUserResident!.user.RegisterUserResidentRequest".user.RegisterUserResidentResponse`
RegisterUserEducation".user.RegisterUserEducationRequest#.user.RegisterUserEducationResponseN
RegisterUserJob.user.RegisterUserJobRequest.user.RegisterUserJobResponse?

UpdateUser.user.UpdateUserRequest.user.UpdateUserResponseW
UpdateUserResident.user.UpdateUserResidentRequest .user.UpdateUserResidentResponseD
LoginByMobile.user.LoginMobileRequest.user.LoginMobileResponseA
LoginByEmail.user.LoginEmailRequest.user.LoginEmailResponse;

LoginByOTP.user.LoginOTPRequest.user.LoginOTPResponseB$�	GRPC\\user�GRPC\\user\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

