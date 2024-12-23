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
}
