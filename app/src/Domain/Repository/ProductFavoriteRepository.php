<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Product;
use App\Domain\Entity\ProductFavorite;
use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class ProductFavoriteRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager,
                                                private readonly ORMInterface $ORM)
    {
        parent::__construct($select);
    }

    public function create(User $user, Product $product): ProductFavorite
    {
        $productFavorite = new ProductFavorite();
        $productFavorite->setUser($user);
        $productFavorite->setProduct($product);
        $productFavorite->setCreatedAt(new \DateTimeImmutable());
        $productFavorite->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($productFavorite);
        $this->entityManager->run();

        return $productFavorite;

    }

    public function list(int $userId)
    {
        return $this->ORM->getRepository(ProductFavorite::class)
                ->select()
                ->where('user_id', $userId)
                ->fetchAll();
    }

    public function delete(int $id)
    {
        $productFavorite = $this->ORM->getRepository(ProductFavorite::class)
            ->findByPK($id);

        $this->entityManager->delete($productFavorite);
        $this->entityManager->run();

        return $productFavorite;
    }

}
