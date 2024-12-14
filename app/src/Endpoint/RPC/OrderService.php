<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Entity\Cart;
use App\Domain\Entity\Order;
use App\Domain\Entity\OrderItem;
use App\Domain\Entity\User;
use Cycle\ORM\ORMInterface;
use GRPC\order\orderCreateRequest;
use GRPC\order\orderCreateResponse;
use GRPC\order\OrderGrpcInterface;
use Spiral\RoadRunner\GRPC;

class OrderService implements OrderGrpcInterface
{
    public function __construct(private readonly ORMInterface $ORM)
    {}

    #[AuthenticatedBy(['user'])]
    public function OrderCreate(GRPC\ContextInterface $ctx, OrderCreateRequest $in): OrderCreateResponse
    {
        $user = $this->ORM->getRepository(User::class)->findByPK($in->getUserId());
        $totalPrice = $this->calculateTotalPrice($user);

        print_r($user->getCart()[0]->getProductPrice()->getId());
        $order = $this->ORM->getRepository(Order::class)->create($user, $totalPrice);

        $this->setOrderItems($user, $order);

        $this->deleteCartByUser($user);

        $response = new OrderCreateResponse();
        $response->setUserId($user->getId());
        $response->setStatus('pending');
        $response->setTotalPrice($totalPrice);

        return $response;
    }

    private function calculateTotalPrice(User $user)
    {
        $totalPrice = null;
        foreach ($user->getCart() as $cart){
            $totalPrice += $cart->getTotalPrice();
        }
        return $totalPrice;
    }

    private function deleteCartByUser(User $user): void
    {
        foreach ($user->getCart() as $cart)
        {
            $this->ORM->getRepository(Cart::class)->deleteByUser($cart->getId(), $user->getId());
        }
    }

    private function setOrderItems(User $user, Order $order): OrderItem
    {
        foreach ($user->getCart() as $cart){
            return $this->ORM->getRepository(OrderItem::class)
                ->create($user, $order, $cart->getProductPrice()->getId(),
                        $cart->getNumber(), $cart->getTotalPrice(), $order->getStatus());
        }
    }
}
