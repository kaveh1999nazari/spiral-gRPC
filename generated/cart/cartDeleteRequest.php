<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: cart.proto

namespace GRPC\cart;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>cart.cartDeleteRequest</code>
 */
class cartDeleteRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 cartId = 1;</code>
     */
    protected $cartId = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $cartId
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

}
