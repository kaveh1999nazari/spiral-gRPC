<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: order.proto

namespace GRPC\order;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>order.orderListResponse</code>
 */
class orderListResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated .order.orderUser orders = 1;</code>
     */
    private $orders;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\GRPC\order\orderUser>|\Google\Protobuf\Internal\RepeatedField $orders
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\order\GPBMetadata\Order::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .order.orderUser orders = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Generated from protobuf field <code>repeated .order.orderUser orders = 1;</code>
     * @param array<\GRPC\order\orderUser>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOrders($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \GRPC\order\orderUser::class);
        $this->orders = $arr;

        return $this;
    }

}

