<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Entity\Cart;
use App\Domain\Entity\Order;
use App\Domain\Entity\OrderItem;
use App\Domain\Entity\User;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\order\orderCreateRequest;
use GRPC\order\orderCreateResponse;
use GRPC\order\OrderGrpcInterface;
use GRPC\order\orderUpdateRequest;
use GRPC\order\orderUpdateResponse;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class OrderService implements OrderGrpcInterface
{
    public function __construct(private readonly ORMInterface $ORM)
    {}

    #[AuthenticatedBy(['user'])]
    public function OrderCreate(GRPC\ContextInterface $ctx, OrderCreateRequest $in): OrderCreateResponse
    {
        $user = $this->ORM->getRepository(User::class)->findByPK($in->getUserId());

        if (! $user->getCart())
        {
            throw new GRPCException(
                message: "You have not cart yet.",
                code: Code::NOT_FOUND
            );
        }

        $totalPrice = $this->calculateTotalPrice($user);

        $order = $this->ORM->getRepository(Order::class)->create($user, $totalPrice);

        $this->setOrderItems($user, $order);

        $this->deleteCartByUser($user);

        $response = new OrderCreateResponse();
        $response->setUserId($user->getId());
        $response->setStatus('pending');
        $response->setTotalPrice($totalPrice);

        return $response;
    }

    public function OrderUpdate(GRPC\ContextInterface $ctx, OrderUpdateRequest $in): OrderUpdateResponse
    {
        $order = $this->ORM->getRepository(Order::class)->findByPK($in->getOrderId());

        if(! $order){
            throw new GRPCException(
                message: "Order Not Found",
                code: Code::NOT_FOUND
            );
        }

        $this->ORM->getRepository(Order::class)
            ->update($order->getId(), $in->getStatus());

        $this->ORM->getRepository(OrderItem::class)
            ->update($order->getId(), $in->getStatus());

        $response = new OrderUpdateResponse();
        $response->setMessage("successfully order ID : {$order->getId()} updated");

        return $response;
    }


    // ------ Methods -------

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
        $orderItems = [];
        foreach ($user->getCart() as $cart){
            $orderItem = $this->ORM->getRepository(OrderItem::class)
                ->create($user, $order, $cart->getProductPrice()->getId(),
                        $cart->getNumber(), $cart->getTotalPrice(), $order->getStatus());
            $orderItems = $orderItem;
        }
        return $orderItems;
    }
}
