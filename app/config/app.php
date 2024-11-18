<?php

$app = \App\Application\Kernel::create(
    directories: [
        'root' => __DIR__,
        'public' => __DIR__ . '/upload'
    ])->run();

