<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: order.proto

namespace GRPC\order\GPBMetadata;

class Order
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(
            '
�
order.protoorder"?
orderCreateRequest
user_id (
user_resident_id ("b
orderCreateResponse
user_id (
status (	
total_price (	
user_resident (	"6
orderUpdateRequest
order_id (
status (	"&
orderUpdateResponse
message (	"#
orderListRequest
user_id ("5
orderListResponse 
orders (2.order.orderUser"V
	orderUser
order_id (
total_price (	
status (	

order_time (	"7
orderCancelRequest
user_id (
order_id ("&
orderCancelResponse
message (	2�
	OrderGrpcD
OrderCreate.order.orderCreateRequest.order.orderCreateResponseD
OrderUpdate.order.orderUpdateRequest.order.orderUpdateResponse>
	OrderList.order.orderListRequest.order.orderListResponseD
OrderCancel.order.orderCancelRequest.order.orderCancelResponseB&�
GRPC\\order�GRPC\\order\\GPBMetadatabproto3'
        , true);

        static::$is_initialized = true;
    }
}

