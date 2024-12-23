<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product.proto

namespace GRPC\product;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>product.ProductList</code>
 */
class ProductList extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 product_id = 1;</code>
     */
    protected $product_id = 0;
    /**
     * Generated from protobuf field <code>string product_name = 2;</code>
     */
    protected $product_name = '';
    /**
     * Generated from protobuf field <code>float price = 3;</code>
     */
    protected $price = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $product_id
     *     @type string $product_name
     *     @type float $price
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\product\GPBMetadata\Product::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint64 product_id = 1;</code>
     * @return int|string
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Generated from protobuf field <code>uint64 product_id = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setProductId($var)
    {
        GPBUtil::checkUint64($var);
        $this->product_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string product_name = 2;</code>
     * @return string
     */
    public function getProductName()
    {
        return $this->product_name;
    }

    /**
     * Generated from protobuf field <code>string product_name = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setProductName($var)
    {
        GPBUtil::checkString($var, True);
        $this->product_name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>float price = 3;</code>
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Generated from protobuf field <code>float price = 3;</code>
     * @param float $var
     * @return $this
     */
    public function setPrice($var)
    {
        GPBUtil::checkFloat($var);
        $this->price = $var;

        return $this;
    }

}

