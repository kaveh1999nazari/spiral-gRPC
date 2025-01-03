<?php

namespace App\Domain\Repository;

use App\Domain\Entity\NotificationChannel;
use App\Domain\Entity\NotificationPreference;
use App\Domain\Entity\NotificationType;
use App\Domain\Entity\User;
use Cycle\ORM\EntityManager;
use Cycle\ORM\ORMInterface;
use Cycle\ORM\Select;
use Cycle\ORM\Select\Repository;

class NotificationPreferenceRepository extends Repository
{

    public function __construct(Select $select, private readonly EntityManager $entityManager,
                                private readonly ORMInterface $ORM)
    {
        parent::__construct($select);
    }

    public function create(User $user): NotificationPreference
    {
        $notificationTypes = $this->ORM->getRepository(NotificationType::class)
            ->findAll();

        $notificationChannels = $this->ORM->getRepository(NotificationChannel::class)
            ->select()
            ->where(['name' => 'App'])
            ->orWhere(['name' => 'Email'])
            ->fetchAll();


        foreach ($notificationTypes as $notificationType){
            foreach ($notificationChannels as $notificationChannel){
                $notificationPreferences = new NotificationPreference();

                $notificationPreferences->setUser($user);
                $notificationPreferences->setNotificationType($notificationType);
                $notificationPreferences->setNotificationChannel($notificationChannel);
                $notificationPreferences->setIsEnabled(true);
                $notificationPreferences->setIsUserModifiable(true);
                $notificationPreferences->setCreatedAt(new \DateTimeImmutable());
                $notificationPreferences->setUpdatedAt(new \DateTimeImmutable());

                $this->entityManager->persist($notificationPreferences);
            }
        }

        $this->entityManager->run();

        return $notificationPreferences;

    }

}
