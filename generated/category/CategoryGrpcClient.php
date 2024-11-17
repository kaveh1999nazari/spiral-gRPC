<?php

declare(strict_types=1);

namespace GRPC\category;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class CategoryGrpcClient implements CategoryGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function categoryCreate(ContextInterface $ctx, CategoryCreateRequest $in): CategoryCreateResponse
    {
        [$response, $status] = $this->core->callAction(CategoryGrpcInterface::class, '/'.self::NAME.'/categoryCreate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\category\CategoryCreateResponse::class,
        ]);

        return $response;
    }
}
