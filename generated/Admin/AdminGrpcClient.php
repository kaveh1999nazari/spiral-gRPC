<?php

declare(strict_types=1);

namespace GRPC\Admin;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class AdminGrpcClient implements AdminGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function categoryCreate(ContextInterface $ctx, CategoryCreateRequest $in): CategoryCreateResponse
    {
        [$response, $status] = $this->core->callAction(AdminGrpcInterface::class, '/'.self::NAME.'/categoryCreate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\Admin\CategoryCreateResponse::class,
        ]);

        return $response;
    }
}
