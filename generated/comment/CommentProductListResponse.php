<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: comment.proto

namespace GRPC\comment;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>comment.CommentProductListResponse</code>
 */
class CommentProductListResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>repeated string comment = 1;</code>
     */
    private $comment;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $comment
     * }
     */
    public function __construct($data = NULL) {
        \GRPC\comment\GPBMetadata\Comment::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>repeated string comment = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Generated from protobuf field <code>repeated string comment = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setComment($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->comment = $arr;

        return $this;
    }

}

