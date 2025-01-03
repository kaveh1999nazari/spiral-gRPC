<?php

declare(strict_types=1);

namespace GRPC\comment;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class CommentGrpcClient implements CommentGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function commentProductCreate(
        ContextInterface $ctx,
        CommentProductCreateRequest $in,
    ): CommentProductCreateResponse {
        [$response, $status] = $this->core->callAction(CommentGrpcInterface::class, '/'.self::NAME.'/commentProductCreate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\comment\CommentProductCreateResponse::class,
        ]);

        return $response;
    }

    public function commentProductUpdate(
        ContextInterface $ctx,
        CommentProductUpdateRequest $in,
    ): CommentProductUpdateResponse {
        [$response, $status] = $this->core->callAction(CommentGrpcInterface::class, '/'.self::NAME.'/commentProductUpdate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\comment\CommentProductUpdateResponse::class,
        ]);

        return $response;
    }

    public function commentProductList(
        ContextInterface $ctx,
        CommentProductListRequest $in,
    ): CommentProductListResponse {
        [$response, $status] = $this->core->callAction(CommentGrpcInterface::class, '/'.self::NAME.'/commentProductList', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\comment\CommentProductListResponse::class,
        ]);

        return $response;
    }
}
