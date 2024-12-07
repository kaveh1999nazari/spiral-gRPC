<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: user.proto

namespace GRPC\user;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>user.RegisterUserJobRequest</code>
 */
class RegisterUserJobRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 user = 1;</code>
     */
    protected $user = 0;
    /**
     * Generated from protobuf field <code>int32 province = 2;</code>
     */
    protected $province = 0;
    /**
     * Generated from protobuf field <code>int32 city = 3;</code>
     */
    protected $city = 0;
    /**
     * Generated from protobuf field <code>string title = 4;</code>
     */
    protected $title = '';
    /**
     * Generated from protobuf field <code>string phone = 5;</code>
     */
    protected $phone = '';
    /**
     * Generated from protobuf field <code>string postal_code = 6;</code>
     */
    protected $postal_code = '';
    /**
     * Generated from protobuf field <code>string address = 7;</code>
     */
    protected $address = '';
    /**
     * Generated from protobuf field <code>float monthly_salary = 8;</code>
     */
    protected $monthly_salary = 0.0;
    /**
     * Generated from protobuf field <code>int32 work_experience_duration = 9;</code>
     */
    protected $work_experience_duration = 0;
    /**
     * Generated from protobuf field <code>string work_type = 10;</code>
     */
    protected $work_type = '';
    /**
     * Generated from protobuf field <code>string contract_type = 11;</code>
     */
    protected $contract_type = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $user
     *     @type int $province
     *     @type int $city
     *     @type string $title
     *     @type string $phone
     *     @type string $postal_code
     *     @type string $address
     *     @type float $monthly_salary
     *     @type int $work_experience_duration
     *     @type string $work_type
     *     @type string $contract_type
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
     * Generated from protobuf field <code>int32 province = 2;</code>
     * @return int
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Generated from protobuf field <code>int32 province = 2;</code>
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
     * Generated from protobuf field <code>int32 city = 3;</code>
     * @return int
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Generated from protobuf field <code>int32 city = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setCity($var)
    {
        GPBUtil::checkInt32($var);
        $this->city = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string title = 4;</code>
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Generated from protobuf field <code>string title = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setTitle($var)
    {
        GPBUtil::checkString($var, True);
        $this->title = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string phone = 5;</code>
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Generated from protobuf field <code>string phone = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setPhone($var)
    {
        GPBUtil::checkString($var, True);
        $this->phone = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string postal_code = 6;</code>
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Generated from protobuf field <code>string postal_code = 6;</code>
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
     * Generated from protobuf field <code>string address = 7;</code>
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Generated from protobuf field <code>string address = 7;</code>
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
     * Generated from protobuf field <code>float monthly_salary = 8;</code>
     * @return float
     */
    public function getMonthlySalary()
    {
        return $this->monthly_salary;
    }

    /**
     * Generated from protobuf field <code>float monthly_salary = 8;</code>
     * @param float $var
     * @return $this
     */
    public function setMonthlySalary($var)
    {
        GPBUtil::checkFloat($var);
        $this->monthly_salary = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 work_experience_duration = 9;</code>
     * @return int
     */
    public function getWorkExperienceDuration()
    {
        return $this->work_experience_duration;
    }

    /**
     * Generated from protobuf field <code>int32 work_experience_duration = 9;</code>
     * @param int $var
     * @return $this
     */
    public function setWorkExperienceDuration($var)
    {
        GPBUtil::checkInt32($var);
        $this->work_experience_duration = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string work_type = 10;</code>
     * @return string
     */
    public function getWorkType()
    {
        return $this->work_type;
    }

    /**
     * Generated from protobuf field <code>string work_type = 10;</code>
     * @param string $var
     * @return $this
     */
    public function setWorkType($var)
    {
        GPBUtil::checkString($var, True);
        $this->work_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string contract_type = 11;</code>
     * @return string
     */
    public function getContractType()
    {
        return $this->contract_type;
    }

    /**
     * Generated from protobuf field <code>string contract_type = 11;</code>
     * @param string $var
     * @return $this
     */
    public function setContractType($var)
    {
        GPBUtil::checkString($var, True);
        $this->contract_type = $var;

        return $this;
    }

}

