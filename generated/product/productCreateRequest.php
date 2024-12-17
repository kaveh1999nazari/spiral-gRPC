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
     * Generated from protobuf field <code>string brand = 3;</code>
     */
    protected $brand = '';
    /**
     * Generated from protobuf field <code>repeated string image = 4;</code>
     */
    private $image;
    /**
     * Generated from protobuf field <code>string in_stock = 5;</code>
     */
    protected $in_stock = '';
    /**
     * Generated from protobuf field <code>int32 category_id = 6;</code>
     */
    protected $category_id = 0;
    /**
     * Generated from protobuf field <code>string price = 7;</code>
     */
    protected $price = '';
    /**
     * Generated from protobuf field <code>map<int32, .product.OptionList> options = 8;</code>
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
     *     @type string $brand
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $image
     *     @type string $in_stock
     *     @type int $category_id
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
     * Generated from protobuf field <code>string brand = 3;</code>
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Generated from protobuf field <code>string brand = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setBrand($var)
    {
        GPBUtil::checkString($var, True);
        $this->brand = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>repeated string image = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Generated from protobuf field <code>repeated string image = 4;</code>
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
     * Generated from protobuf field <code>string in_stock = 5;</code>
     * @return string
     */
    public function getInStock()
    {
        return $this->in_stock;
    }

    /**
     * Generated from protobuf field <code>string in_stock = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setInStock($var)
    {
        GPBUtil::checkString($var, True);
        $this->in_stock = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>int32 category_id = 6;</code>
     * @return int
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * Generated from protobuf field <code>int32 category_id = 6;</code>
     * @param int $var
     * @return $this
     */
    public function setCategoryId($var)
    {
        GPBUtil::checkInt32($var);
        $this->category_id = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string price = 7;</code>
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Generated from protobuf field <code>string price = 7;</code>
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
     * Generated from protobuf field <code>map<int32, .product.OptionList> options = 8;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Generated from protobuf field <code>map<int32, .product.OptionList> options = 8;</code>
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

