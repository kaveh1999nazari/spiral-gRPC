<?php

return [
    'channels' => [
        'app' => [
            'type' => 'app',
            'class' => \App\Domain\Notifications\Channels\AppChannel::class,
            'transport' => 'app_transport',
        ],
        'email' => [
            'type' => 'email',
            'transport' => 'smtp_transport',
        ],
    ],

    'transports' => [
        'app_transport' => 'null://',
        'smtp_transport' => env('MAILER_DSN'),
    ],

    'policies' => [
        'urgent' => ['app', 'email'],
        'high' => ['app', 'email'],
    ],

    'typeAliases' => [
        'email' => \App\Domain\Notifications\Channels\EmailChannel::class,
        'app' => \App\Domain\Notifications\Channels\AppChannel::class,
    ],

    'message' => [
        'login' => 'you have login successfully in :date: - :hour: !'
    ]
];
