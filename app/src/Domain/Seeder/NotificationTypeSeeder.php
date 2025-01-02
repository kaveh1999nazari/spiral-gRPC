<?php

namespace App\Domain\Seeder;

use App\Domain\Entity\NotificationType;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class NotificationTypeSeeder extends AbstractSeeder
{
    public function run(): \Generator
    {
        $notificationTypes = [
            ['slug' => 'register', 'name' => 'Register'],
            ['slug' => 'login', 'name' => 'Login'],
            ['slug' => 'order_status', 'name' => 'Order Status'],
            ['slug' => 'order_cancel', 'name' => 'Order Cancel']
        ];

        foreach ($notificationTypes as $notificationType){
            $notificationTypeEntity = new NotificationType();

            $notificationTypeEntity->setSlug($notificationType['slug']);
            $notificationTypeEntity->setName($notificationType['name']);
            $notificationTypeEntity->setCreatedAt(new \DateTimeImmutable());
            $notificationTypeEntity->setUpdatedAt(new \DateTimeImmutable());

            yield $notificationTypeEntity;
        }

    }

}
