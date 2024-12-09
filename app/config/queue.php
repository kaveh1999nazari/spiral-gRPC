<?php

return [
    'default' => 'sync',
    'aliases' => [
        'welcome-email-job' => \App\Endpoint\Job\SendWelcomeEmailJob::class,
    ],
    'connections' => [
        'sync' => [
            'driver' => 'sync',
        ],
    ],
];
