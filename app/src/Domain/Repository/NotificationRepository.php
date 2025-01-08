<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Notifications;
use Cycle\ORM\EntityManagerInterface;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class NotificationRepository extends Repository
{
    public function __construct(Select $select, private readonly EntityManagerInterface $entityManager,
                                                private readonly ORMInterface $orm)
    {
        parent::__construct($select);
    }

    public function findUnreadByUser(int $userId): array
    {
        return $this->orm->getRepository(Notifications::class)
            ->select()
            ->where('notifiable_id', $userId)
            ->andWhere('read_at', null)
            ->fetchAll();
    }

    public function markAsRead(string $id): void
    {
        $notification = $this->orm->getRepository(Notifications::class)
            ->findByPK($id);

        if ($notification) {
            $notification->setReadAt(new \DateTimeImmutable());
            $this->entityManager->persist($notification);
            $this->entityManager->run();
        }
    }
}
