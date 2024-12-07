<?php
# Generated by the protocol buffer compiler (roadrunner-server/grpc). DO NOT EDIT!
# source: user.proto

namespace GRPC\user;

use Spiral\RoadRunner\GRPC;

interface UserGrpcInterface extends GRPC\ServiceInterface
{
    // GRPC specific service name.
    public const NAME = "user.UserGrpc";

    /**
    * @param GRPC\ContextInterface $ctx
    * @param RegisterUserRequest $in
    * @return RegisterUserResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function RegisterUser(GRPC\ContextInterface $ctx, RegisterUserRequest $in): RegisterUserResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param RegisterUserResidentRequest $in
    * @return RegisterUserResidentResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function RegisterUserResident(GRPC\ContextInterface $ctx, RegisterUserResidentRequest $in): RegisterUserResidentResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param RegisterUserEducationRequest $in
    * @return RegisterUserEducationResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function RegisterUserEducation(GRPC\ContextInterface $ctx, RegisterUserEducationRequest $in): RegisterUserEducationResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param LoginMobileRequest $in
    * @return LoginMobileResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function LoginByMobile(GRPC\ContextInterface $ctx, LoginMobileRequest $in): LoginMobileResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param LoginEmailRequest $in
    * @return LoginEmailResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function LoginByEmail(GRPC\ContextInterface $ctx, LoginEmailRequest $in): LoginEmailResponse;

    /**
    * @param GRPC\ContextInterface $ctx
    * @param LoginOTPRequest $in
    * @return LoginOTPResponse
    *
    * @throws GRPC\Exception\InvokeException
    */
    public function LoginByOTP(GRPC\ContextInterface $ctx, LoginOTPRequest $in): LoginOTPResponse;
}
