<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product.proto

namespace GRPC\product;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 *product discount
 *
 * Generated from protobuf message <code>product.ProductDiscountRequest</code>
 */
class ProductDiscountRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 product_price_id = 1;</code>
     */
    protected $product_price_id = 0;
    /**
     * Generated from protobuf field <code>float discount_percentage = 2;</code>
     */
    protected $discount_percentage = 0.0;
    /**
     * Generated from protobuf field <code>string discount_time = 3;</code>
     */
    protected $discount_time = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $product_price_id
     *     @type float $discount_percentage
     *     @type string $discount_time
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\product\GPBMetadata\Product::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint64 product_price_id = 1;</code>
     * @return int|string
     */
    public function getProductPriceId()
    {
        return $this->product_price_id;
    }

    /**
     * Generated from protobuf field <code>uint64 product_price_id = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setProductPriceId($var)
    {
        GPBUtil::checkUint64($var);
        $this->product_price_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>float discount_percentage = 2;</code>
     * @return float
     */
    public function getDiscountPercentage()
    {
        return $this->discount_percentage;
    }

    /**
     * Generated from protobuf field <code>float discount_percentage = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setDiscountPercentage($var)
    {
        GPBUtil::checkFloat($var);
        $this->discount_percentage = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string discount_time = 3;</code>
     * @return string
     */
    public function getDiscountTime()
    {
        return $this->discount_time;
    }

    /**
     * Generated from protobuf field <code>string discount_time = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setDiscountTime($var)
    {
        GPBUtil::checkString($var, True);
        $this->discount_time = $var;

        return $this;
    }

}

