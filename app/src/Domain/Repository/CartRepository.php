<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Cart;
use App\Domain\Entity\ProductPrice;
use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;
use Google\Rpc\Code;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class CartRepository extends Repository
{

    public function __construct(Select $select,
                                private readonly EntityManager $entityManager,
                                private readonly ORMInterface $ORM
    )
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

    public function deleteByUser(int $userId): Cart
    {
        $carts = $this->ORM->getRepository(Cart::class)->select()->where('user_id', $userId)->fetchAll();

        if(! $carts) {
            throw new GRPCException(
                message: "the cart is not exist!",
                code: Code::UNAVAILABLE
            );
        }

        foreach($carts as $cart) {
            $this->entityManager->delete($cart);
        }
        $this->entityManager->run();

        return $cart;

    }
}
