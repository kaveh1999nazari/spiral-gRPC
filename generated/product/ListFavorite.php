<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product.proto

namespace GRPC\product;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>product.ListFavorite</code>
 */
class ListFavorite extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 product_id = 1;</code>
     */
    protected $product_id = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $product_id
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

}
