<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: comment.proto

namespace GRPC\comment;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>comment.CommentProductCreateRequest</code>
 */
class CommentProductCreateRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>uint64 product_price_id = 1;</code>
     */
    protected $product_price_id = 0;
    /**
     * Generated from protobuf field <code>string comment = 2;</code>
     */
    protected $comment = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int|string $product_price_id
     *     @type string $comment
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

    /**
     * Generated from protobuf field <code>string comment = 2;</code>
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Generated from protobuf field <code>string comment = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setComment($var)
    {
        GPBUtil::checkString($var, True);
        $this->comment = $var;

        return $this;
    }

}

