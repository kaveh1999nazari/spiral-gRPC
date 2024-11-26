<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Cart;
use App\Domain\Entity\ProductPrice;
use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\Select;

class CartRepository
{

    public function __construct(private readonly EntityManager $entityManager)
    {
    }

    public function create(User $user, string $uuid, ProductPrice $productPrice, int $number, string $totalPrice): Cart
    {
        $cart = new Cart();
        $cart->setUser($user);
        $cart->setUuid($uuid);
        $cart->setProductPrice($productPrice);
        $cart->setNumber($number);
        $cart->setTotalPrice($totalPrice);

        $this->entityManager->persist($cart);
        $this->entityManager->run();

        return $cart;

    }

}
