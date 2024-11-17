<?php

declare(strict_types=1);

namespace GRPC\product;

use Spiral\Core\InterceptableCore;
use Spiral\RoadRunner\GRPC\ContextInterface;

class ProductGrpcClient implements ProductGrpcInterface
{
    public function __construct(
        private readonly InterceptableCore $core,
    ) {
    }

    public function ProductCreate(ContextInterface $ctx, ProductCreateRequest $in): ProductCreateResponse
    {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductCreate', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductCreateResponse::class,
        ]);

        return $response;
    }
}
