<?php

namespace App\Domain\Repository;

use App\Domain\Entity\CommentProduct;
use App\Domain\Entity\OrderItem;
use App\Domain\Entity\ProductPrice;
use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class CommentProductRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(User $user, ProductPrice $productPrice, ?OrderItem $orderItem = null, string $comment): CommentProduct
    {
        $commentProduct = new CommentProduct();

        $commentProduct->setUser($user);
        $commentProduct->setProductPrice($productPrice);
        if ($orderItem !== null){
            $commentProduct->setOrderItem($orderItem);
        }
        $commentProduct->setComment($comment);
        $commentProduct->setCreatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($commentProduct);
        $this->entityManager->run();

        return $commentProduct;
    }

}
