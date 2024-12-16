<?php

namespace App\Endpoint\RPC;

use App\Domain\Attribute\AuthenticatedBy;
use App\Domain\Entity\Cart;
use App\Domain\Entity\Order;
use App\Domain\Entity\OrderItem;
use App\Domain\Entity\User;
use App\Domain\Entity\UserResident;
use App\Endpoint\Job\SendOrderNotificationEmailJob;
use Cycle\ORM\ORMInterface;
use Google\Rpc\Code;
use GRPC\order\orderCancelRequest;
use GRPC\order\orderCancelResponse;
use GRPC\order\orderCreateRequest;
use GRPC\order\orderCreateResponse;
use GRPC\order\OrderGrpcInterface;
use GRPC\order\orderListRequest;
use GRPC\order\orderListResponse;
use GRPC\order\orderUpdateRequest;
use GRPC\order\orderUpdateResponse;
use Spiral\Queue\QueueInterface;
use Spiral\RoadRunner\GRPC;
use Spiral\RoadRunner\GRPC\Exception\GRPCException;

class OrderService implements OrderGrpcInterface
{
    public function __construct(private readonly ORMInterface $ORM,
                                private readonly QueueInterface $queue)
    {}

    #[AuthenticatedBy(['user'])]
    public function OrderCreate(GRPC\ContextInterface $ctx, OrderCreateRequest $in): OrderCreateResponse
    {
        $user = $this->checkUserAuthentication($in->getUserId());

        $userResident = $this->checkUserResidentAuthentication($in->getUserResidentId());

        $totalPrice = $this->calculateTotalPrice($user);

        $order = $this->ORM->getRepository(Order::class)
            ->create($user, $totalPrice, $userResident);

        $this->setOrderItems($user, $order);

        $this->deleteCartByUser($user);

        $response = new OrderCreateResponse();
        $response->setUserId($user->getId());
        $response->setStatus('pending');
        $response->setTotalPrice($totalPrice);
        $response->setUserResident($userResident->getAddress());

        return $response;
    }

    #[AuthenticatedBy(['admin'])]
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

        $this->sendOrderStatusNotificationMail($order, $order->getStatus());

        $response = new OrderUpdateResponse();
        $response->setMessage("successfully order ID : {$order->getId()} updated");

        return $response;
    }

    #[AuthenticatedBy(['user'])]
    public function OrderList(GRPC\ContextInterface $ctx, OrderListRequest $in): OrderListResponse
    {
        $orders = $this->ORM->getRepository(Order::class)
            ->select()
            ->where(['user_id' => $in->getUserId()])->fetchAll();

       return $this->buildListResponse($orders);
    }

    #[AuthenticatedBy(['user', 'admin'])]
    public function OrderCancel(GRPC\ContextInterface $ctx, OrderCancelRequest $in): OrderCancelResponse
    {
        $this->authenticateUserOrder($in->getUserId(), $in->getOrderId());

        $this->ORM->getRepository(Order::class)
            ->update($in->getOrderId(), 'canceled');

        $response = new orderCancelResponse();
        $response->setMessage('your order successfully canceled!');

        return $response;

    }


    // ------ Methods -------

    private function checkUserAuthentication(int $userId): User
    {
        $user = $this->ORM->getRepository(User::class)
            ->findByPK($userId);

        if (! $user->getCart())
        {
            throw new GRPCException(
                message: "You have not cart yet.",
                code: Code::NOT_FOUND
            );
        }

        return $user;
    }

    private function checkUserResidentAuthentication(int $userResidentId): UserResident
    {
        $userResident = $this->ORM->getRepository(UserResident::class)
            ->findByPK($userResidentId);

        if (! $userResident)
        {
            throw new GRPCException(
                message: "You have not any address yet!",
                code: Code::NOT_FOUND
            );
        }

        return $userResident;
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
            $this->ORM->getRepository(Cart::class)
                ->deleteByUser($cart->getId(), $user->getId());
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

    private function buildListResponse(array $orders): OrderListResponse
    {
        $response = new OrderListResponse();

        $allOrder = [];
        foreach ($orders as $order)
        {
            $orderUser = new \GRPC\order\orderUser();
            $orderUser->setOrderId($order->getId());
            $orderUser->setTotalPrice($order->getTotalPrice());
            $orderUser->setStatus($order->getStatus());
            $orderUser->setOrderTime($order->getCreatedAt()->format('Y-m-d H:i:s'));

            $allOrder[] = $orderUser;
        }

        $response->setOrders($allOrder);

        return $response;
    }

    private function authenticateUserOrder(int $userId, int $orderId)
    {
        $user = $this->ORM->getRepository(User::class)->findByPK($userId);

        if (! $user){
            throw new GRPCException(
                message: 'User Not Found',
                code: Code::NOT_FOUND
            );
        }

        $order = $this->ORM->getRepository(Order::class)->findByPK($orderId);

        if (! $order){
            throw new GRPCException(
                message: "this {$user->getMobile()} not found or has no order yet!",
                code: Code::NOT_FOUND
            );
        }
    }

    private function sendOrderStatusNotificationMail(Order $order, string $status): void
    {
        $this->queue->push(SendOrderNotificationEmailJob::class,[
            'order' => $order,
            'status' => $status
        ]);
    }
}
