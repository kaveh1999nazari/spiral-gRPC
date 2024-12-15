<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: order.proto

namespace GRPC\order;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>order.OrderItem</code>
 */
class OrderItem extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 order_id = 1;</code>
     */
    protected $order_id = 0;
    /**
     * Generated from protobuf field <code>int32 user_id = 2;</code>
     */
    protected $user_id = 0;
    /**
     * Generated from protobuf field <code>int32 product_price_id = 3;</code>
     */
    protected $product_price_id = 0;
    /**
     * Generated from protobuf field <code>string price = 4;</code>
     */
    protected $price = '';
    /**
     * Generated from protobuf field <code>string status = 5;</code>
     */
    protected $status = '';
    /**
     * Generated from protobuf field <code>string order_time = 6;</code>
     */
    protected $order_time = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $order_id
     *     @type int $user_id
     *     @type int $product_price_id
     *     @type string $price
     *     @type string $status
     *     @type string $order_time
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\order\GPBMetadata\Order::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 order_id = 1;</code>
     * @return int
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Generated from protobuf field <code>int32 order_id = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setOrderId($var)
    {
        GPBUtil::checkInt32($var);
        $this->order_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 user_id = 2;</code>
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Generated from protobuf field <code>int32 user_id = 2;</code>
     * @param int $var
     * @return $this
     */
    public function setUserId($var)
    {
        GPBUtil::checkInt32($var);
        $this->user_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 product_price_id = 3;</code>
     * @return int
     */
    public function getProductPriceId()
    {
        return $this->product_price_id;
    }

    /**
     * Generated from protobuf field <code>int32 product_price_id = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setProductPriceId($var)
    {
        GPBUtil::checkInt32($var);
        $this->product_price_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string price = 4;</code>
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Generated from protobuf field <code>string price = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setPrice($var)
    {
        GPBUtil::checkString($var, True);
        $this->price = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string status = 5;</code>
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Generated from protobuf field <code>string status = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setStatus($var)
    {
        GPBUtil::checkString($var, True);
        $this->status = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string order_time = 6;</code>
     * @return string
     */
    public function getOrderTime()
    {
        return $this->order_time;
    }

    /**
     * Generated from protobuf field <code>string order_time = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setOrderTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->order_time = $var;

        return $this;
    }

}

