<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Order;
use App\Domain\Entity\User;
use App\Domain\Entity\UserResident;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class OrderRepository extends Repository
{
    public function __construct(protected Select $select,
                                private readonly EntityManager $entityManager,
                                private readonly ORMInterface $ORM)
    {}

    public function create(User $user, string $totalPrice, UserResident $userResident): Order
    {
        $order = new Order();
        $order->setUser($user);
        $order->setTotalPrice($totalPrice);
        $order->setStatus('pending');
        $order->setUserResident($userResident);
        $order->setCreatedAt(new \DateTimeImmutable());
        $order->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($order);
        $this->entityManager->run();

        return $order;
    }

    public function update(int $id, string $status): Order
    {
        $order = $this->ORM->getRepository(Order::class)->findByPK($id);

        $order->setStatus($status);
        $order->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($order);
        $this->entityManager->run();

        return $order;
    }
}
