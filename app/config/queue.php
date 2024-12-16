<?php

return [
    'default' => 'sync',
    'aliases' => [
        'user-notification-email-job' => \App\Endpoint\Job\SendOrderNotificationEmailJob::class,
        'order-notification-email-job' => \App\Endpoint\Job\SendOrderNotificationEmailJob::class
    ],
    'connections' => [
        'sync' => [
            'driver' => 'sync',
        ],
    ],
];
