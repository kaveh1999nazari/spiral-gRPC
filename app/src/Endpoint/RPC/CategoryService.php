<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Entity\Category;
use Cycle\ORM\ORMInterface;
use GRPC\Admin\AdminGrpcInterface;
use GRPC\Admin\categoryCreateRequest;
use GRPC\Admin\categoryCreateResponse;
use Spiral\RoadRunner\GRPC;


class CategoryService implements AdminGrpcInterface
{
    public function __construct(protected readonly ORMInterface $orm){}
    #[AuthenticatedBy]
    public function categoryCreate(GRPC\ContextInterface $ctx, CategoryCreateRequest $in): CategoryCreateResponse
    {
        $name = $in->getName();

        $category = $this->orm->getRepository(Category::class)->create($name);

        $response = new categoryCreateResponse();
        $response->setId($category->getId());
        return $response;
    }

}
