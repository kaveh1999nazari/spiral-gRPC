<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: comment.proto

namespace GRPC\comment\GPBMetadata;

class Comment
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
comment.protocomment"H
CommentProductCreateRequest
product_price_id (
comment (	"/
CommentProductCreateResponse
message (	"<
CommentProductUpdateRequest

id (
	is_active ("/
CommentProductUpdateResponse
message (	"5
CommentProductListRequest
product_price_id ("-
CommentProductListResponse
comment (	2�
CommentGrpcc
commentProductCreate$.comment.CommentProductCreateRequest%.comment.CommentProductCreateResponsec
commentProductUpdate$.comment.CommentProductUpdateRequest%.comment.CommentProductUpdateResponse]
commentProductList".comment.CommentProductListRequest#.comment.CommentProductListResponseB*�GRPC\\comment�GRPC\\comment\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

