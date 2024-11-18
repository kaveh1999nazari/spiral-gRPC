<?php

namespace App\Application\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Boot\DirectoriesInterface;

final class AppBootloader extends Bootloader
{
    public function boot(DirectoriesInterface $dirs): void
    {
        $dirs->set(
            'public',
            $dirs->get('root') . '/upload'
        );
    }

}
