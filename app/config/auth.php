<?php

use Spiral\Core\Container\Autowire;

return [
    // ...
    'storages' => [
        'jwt' => new Autowire(\App\Auth\Storage\JwtTokenStorage::class, [
            'secret' => 'secret',
            'algorithm' => 'HS256',
            'expiresAt' => '+30 days',
        ]),
        // ...
    ]
];
