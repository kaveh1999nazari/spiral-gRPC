<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: comment.proto

namespace GRPC\comment;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>comment.CommentProductListRequest</code>
 */
class CommentProductListRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 product_price_id = 1;</code>
     */
    protected $product_price_id = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $product_price_id
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\comment\GPBMetadata\Comment::initOnce();
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

}
