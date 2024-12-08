<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: product.proto

namespace GRPC\product;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>product.productCreateRequest</code>
 */
class productCreateRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string name = 1;</code>
     */
    protected $name = '';
    /**
     * Generated from protobuf field <code>string description = 2;</code>
     */
    protected $description = '';
    /**
     * Generated from protobuf field <code>repeated string image = 3;</code>
     */
    private $image;
    /**
     * Generated from protobuf field <code>int32 categoryId = 4;</code>
     */
    protected $categoryId = 0;
    /**
     * Generated from protobuf field <code>string price = 5;</code>
     */
    protected $price = '';
    /**
     * Generated from protobuf field <code>map<int32, .product.OptionList> options = 6;</code>
     */
    private $options;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *     @type string $description
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $image
     *     @type int $categoryId
     *     @type string $price
     *     @type array|\Google\Protobuf\Internal\MapField $options
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\product\GPBMetadata\Product::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Generated from protobuf field <code>string name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string description = 2;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Generated from protobuf field <code>string description = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string image = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Generated from protobuf field <code>repeated string image = 3;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setImage($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->image = $arr;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 categoryId = 4;</code>
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Generated from protobuf field <code>int32 categoryId = 4;</code>
     * @param int $var
     * @return $this
     */
    public function setCategoryId($var)
    {
        GPBUtil::checkInt32($var);
        $this->categoryId = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string price = 5;</code>
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Generated from protobuf field <code>string price = 5;</code>
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
     * Generated from protobuf field <code>map<int32, .product.OptionList> options = 6;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Generated from protobuf field <code>map<int32, .product.OptionList> options = 6;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setOptions($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::INT32, \Google\Protobuf\Internal\GPBType::MESSAGE, \GRPC\product\OptionList::class);
        $this->options = $arr;

        return $this;
    }

}

