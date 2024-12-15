<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Order;
use App\Domain\Entity\OrderItem;
use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class OrderItemRepository extends Repository
{
    public function __construct(protected Select $select,
                                private readonly EntityManager $entityManager,
                                private readonly ORMInterface $ORM
    )
    {}

    public function create(User $user, Order $order,
                           int $productPriceId, int $number, string $price, string $status): OrderItem
    {
        $orderItem = new OrderItem();
        $orderItem->setUser($user);
        $orderItem->setOrder($order);
        $orderItem->setProductPriceId($productPriceId);
        $orderItem->setNumber($number);
        $orderItem->setPrice($price);
        $orderItem->setStatus($status);
        $orderItem->setCreatedAt(new \DateTimeImmutable());
        $orderItem->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($orderItem);
        $this->entityManager->run();

        return $orderItem;
    }

    public function update(int $orderId, string $status): OrderItem
    {
        $orderItems = $this->ORM->getRepository(OrderItem::class)
            ->select()
            ->where(['order_id' => $orderId])
            ->fetchAll();

        foreach ($orderItems as $orderItem) {
            $orderItem->setStatus($status);
            $orderItem->setUpdatedAt(new \DateTimeImmutable());
            $this->entityManager->persist($orderItem);
        }

        $this->entityManager->run();

        return $orderItem;
    }
}
