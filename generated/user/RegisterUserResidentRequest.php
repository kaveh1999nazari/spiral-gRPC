<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: user.proto

namespace GRPC\user;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>user.RegisterUserResidentRequest</code>
 */
class RegisterUserResidentRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 user = 1;</code>
     */
    protected $user = 0;
    /**
     * Generated from protobuf field <code>string address = 2;</code>
     */
    protected $address = '';
    /**
     * Generated from protobuf field <code>string postal_code = 3;</code>
     */
    protected $postal_code = '';
    /**
     * Generated from protobuf field <code>int32 province = 4;</code>
     */
    protected $province = 0;
    /**
     * Generated from protobuf field <code>int32 city = 5;</code>
     */
    protected $city = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $user
     *     @type string $address
     *     @type string $postal_code
     *     @type int $province
     *     @type int $city
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\user\GPBMetadata\User::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 user = 1;</code>
     * @return int
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Generated from protobuf field <code>int32 user = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setUser($var)
    {
        GPBUtil::checkInt32($var);
        $this->user = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string address = 2;</code>
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Generated from protobuf field <code>string address = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setAddress($var)
    {
        GPBUtil::checkString($var, True);
        $this->address = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string postal_code = 3;</code>
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Generated from protobuf field <code>string postal_code = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setPostalCode($var)
    {
        GPBUtil::checkString($var, True);
        $this->postal_code = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 province = 4;</code>
     * @return int
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Generated from protobuf field <code>int32 province = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setProvince($var)
    {
        GPBUtil::checkInt32($var);
        $this->province = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 city = 5;</code>
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Generated from protobuf field <code>int32 city = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setCity($var)
    {
        GPBUtil::checkInt32($var);
        $this->city = $var;

        return $this;
    }

}

