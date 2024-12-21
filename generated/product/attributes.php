<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product.proto

namespace GRPC\product;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>product.attributes</code>
 */
class attributes extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 attribute_id = 1;</code>
     */
    protected $attribute_id = 0;
    /**
     * Generated from protobuf field <code>uint64 attribute_value_id = 2;</code>
     */
    protected $attribute_value_id = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $attribute_id
     *     @type int|string $attribute_value_id
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\product\GPBMetadata\Product::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>uint64 attribute_id = 1;</code>
     * @return int|string
     */
    public function getAttributeId()
    {
        return $this->attribute_id;
    }

    /**
     * Generated from protobuf field <code>uint64 attribute_id = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAttributeId($var)
    {
        GPBUtil::checkUint64($var);
        $this->attribute_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>uint64 attribute_value_id = 2;</code>
     * @return int|string
     */
    public function getAttributeValueId()
    {
        return $this->attribute_value_id;
    }

    /**
     * Generated from protobuf field <code>uint64 attribute_value_id = 2;</code>
     * @param int|string $var
     * @return $this
     */
    public function setAttributeValueId($var)
    {
        GPBUtil::checkUint64($var);
        $this->attribute_value_id = $var;

        return $this;
    }

}

