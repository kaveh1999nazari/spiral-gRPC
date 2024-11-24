<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Entity\Category;
use Cycle\ORM\ORMInterface;
use GRPC\category\categoryCreateRequest;
use GRPC\category\categoryCreateResponse;
use GRPC\category\CategoryGrpcInterface;
use Spiral\RoadRunner\GRPC;

class CategoryService implements CategoryGrpcInterface
{
    public function __construct(protected readonly ORMInterface $orm){}
    #[AuthenticatedBy(['admin'])]
    public function categoryCreate(GRPC\ContextInterface $ctx, CategoryCreateRequest $in): CategoryCreateResponse
    {
        $name = $in->getName();

        $category = $this->orm->getRepository(Category::class)->create($name);

        $response = new categoryCreateResponse();
        $response->setId($category->getId());
        return $response;
    }
}
