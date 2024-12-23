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

    public function ProductPriceList(ContextInterface $ctx, ProductPriceListRequest $in): ProductPriceListResponse
    {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductPriceList', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductPriceListResponse::class,
        ]);

        return $response;
    }

    public function ProductSearch(ContextInterface $ctx, ProductSearchRequest $in): ProductSearchResponse
    {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductSearch', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductSearchResponse::class,
        ]);

        return $response;
    }

    public function ProductFilterSearch(
        ContextInterface $ctx,
        ProductFilterSearchRequest $in,
    ): ProductFilterSearchResponse {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductFilterSearch', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductFilterSearchResponse::class,
        ]);

        return $response;
    }

    public function ProductSimilarSearch(
        ContextInterface $ctx,
        ProductSimilarSearchRequest $in,
    ): ProductSimilarSearchResponse {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductSimilarSearch', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductSimilarSearchResponse::class,
        ]);

        return $response;
    }

    public function ProductCreateFavorite(
        ContextInterface $ctx,
        ProductCreateFavoriteRequest $in,
    ): ProductCreateFavoriteResponse {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductCreateFavorite', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductCreateFavoriteResponse::class,
        ]);

        return $response;
    }

    public function ProductListFavorite(
        ContextInterface $ctx,
        ProductListFavoriteRequest $in,
    ): ProductListFavoriteResponse {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductListFavorite', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductListFavoriteResponse::class,
        ]);

        return $response;
    }

    public function ProductDeleteFavorite(
        ContextInterface $ctx,
        ProductDeleteFavoriteRequest $in,
    ): ProductDeleteFavoriteResponse {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductDeleteFavorite', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductDeleteFavoriteResponse::class,
        ]);

        return $response;
    }

    public function ProductDiscount(ContextInterface $ctx, ProductDiscountRequest $in): ProductDiscountResponse
    {
        [$response, $status] = $this->core->callAction(ProductGrpcInterface::class, '/'.self::NAME.'/ProductDiscount', [
            'in' => $in,
            'ctx' => $ctx,
            'responseClass' => \GRPC\product\ProductDiscountResponse::class,
        ]);

        return $response;
    }
}
