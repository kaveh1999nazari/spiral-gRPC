<?php

namespace App\Domain\Seeder;

use App\Domain\Entity\NotificationChannel;
use Spiral\DatabaseSeeder\Attribute\Seeder;
use Spiral\DatabaseSeeder\Seeder\AbstractSeeder;

#[Seeder]
class NotificationChannelSeeder extends AbstractSeeder
{
    public function run(): \Generator
    {
        $notificationChannels = [
            ['slug' => 'email', 'name' => 'Email'],
            ['slug' => 'sms', 'name' => 'SMS'],
            ['slug' => 'app', 'name' => 'App'],
        ];


        foreach ($notificationChannels as $notificationChannel) {
            $notificationChannelEntity = new NotificationChannel();

            $notificationChannelEntity->setSlug($notificationChannel['slug']);
            $notificationChannelEntity->setName($notificationChannel['name']);
            $notificationChannelEntity->setCreatedAt(new \DateTimeImmutable());
            $notificationChannelEntity->setUpdatedAt(new \DateTimeImmutable());

            yield $notificationChannelEntity;
        }

    }

}
