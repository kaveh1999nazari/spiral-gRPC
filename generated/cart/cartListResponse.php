<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: cart.proto

namespace GRPC\cart;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>cart.cartListResponse</code>
 */
class cartListResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 cartId = 1;</code>
     */
    protected $cartId = 0;
    /**
     * Generated from protobuf field <code>int32 ProductPriceId = 2;</code>
     */
    protected $ProductPriceId = 0;
    /**
     * Generated from protobuf field <code>int32 number = 3;</code>
     */
    protected $number = 0;
    /**
     * Generated from protobuf field <code>int64 allTotalPrice = 4;</code>
     */
    protected $allTotalPrice = 0;
    /**
     * Generated from protobuf field <code>int32 userId = 5;</code>
     */
    protected $userId = 0;
    /**
     * Generated from protobuf field <code>string uuid = 6;</code>
     */
    protected $uuid = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $cartId
     *     @type int $ProductPriceId
     *     @type int $number
     *     @type int|string $allTotalPrice
     *     @type int $userId
     *     @type string $uuid
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\cart\GPBMetadata\Cart::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 cartId = 1;</code>
     * @return int
     */
    public function getCartId()
    {
        return $this->cartId;
    }

    /**
     * Generated from protobuf field <code>int32 cartId = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setCartId($var)
    {
        GPBUtil::checkInt32($var);
        $this->cartId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 ProductPriceId = 2;</code>
     * @return int
     */
    public function getProductPriceId()
    {
        return $this->ProductPriceId;
    }

    /**
     * Generated from protobuf field <code>int32 ProductPriceId = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setProductPriceId($var)
    {
        GPBUtil::checkInt32($var);
        $this->ProductPriceId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 number = 3;</code>
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Generated from protobuf field <code>int32 number = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setNumber($var)
    {
        GPBUtil::checkInt32($var);
        $this->number = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int64 allTotalPrice = 4;</code>
     * @return int|string
     */
    public function getAllTotalPrice()
    {
        return $this->allTotalPrice;
    }

    /**
     * Generated from protobuf field <code>int64 allTotalPrice = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAllTotalPrice($var)
    {
        GPBUtil::checkInt64($var);
        $this->allTotalPrice = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 userId = 5;</code>
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Generated from protobuf field <code>int32 userId = 5;</code>
     * @param int $var
     * @return $this
     */
    public function setUserId($var)
    {
        GPBUtil::checkInt32($var);
        $this->userId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string uuid = 6;</code>
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Generated from protobuf field <code>string uuid = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setUuid($var)
    {
        GPBUtil::checkString($var, True);
        $this->uuid = $var;

        return $this;
    }

}

