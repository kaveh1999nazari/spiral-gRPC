<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Cart;
use App\Domain\Entity\ProductPrice;
use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class CartRepository extends Repository
{

    public function __construct(Select $select, private readonly EntityManager $entityManager)
    {
        parent::__construct($select);
    }

    public function create(?User $user, string $uuid, ProductPrice $productPrice, int $number, string $totalPrice): Cart
    {
        $cart = new Cart();
        $cart->setUser($user) ;
        $cart->setUuid($uuid);
        $cart->setProductPrice($productPrice);
        $cart->setNumber($number);
        $cart->setTotalPrice($totalPrice);

        $this->entityManager->persist($cart);
        $this->entityManager->run();

        return $cart;



    }

}
