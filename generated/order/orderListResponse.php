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
     * Generated from protobuf field <code>repeated .order.OrderItem order_items = 1;</code>
     */
    private $order_items;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\GRPC\order\OrderItem>|\Google\Protobuf\Internal\RepeatedField $order_items
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\order\GPBMetadata\Order::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated .order.OrderItem order_items = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getOrderItems()
    {
        return $this->order_items;
    }

    /**
     * Generated from protobuf field <code>repeated .order.OrderItem order_items = 1;</code>
     * @param array<\GRPC\order\OrderItem>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setOrderItems($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \GRPC\order\OrderItem::class);
        $this->order_items = $arr;

        return $this;
    }

}

