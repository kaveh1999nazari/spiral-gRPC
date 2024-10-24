<?php

declare(strict_types=1);

namespace Installer\Module\Validators\Laravel;

use Installer\Application\ComposerPackages;
use Installer\Internal\Package as BasePackage;
use Installer\Internal\Readme\Block\ListBlock;
use Installer\Internal\Readme\Section;
use Installer\Module\Validators\Laravel\Generator\Bootloaders;
use Installer\Module\Validators\Laravel\Generator\Middlewares;

final class Package extends BasePackage
{
    public function __construct()
    {
        parent::__construct(
            package: ComposerPackages::LaravelValidator,
            generators: [
                new Bootloaders(),
                new Middlewares(),
            ],
        );
    }

    public function getReadme(): array
    {
        return [
            Section::Configuration->value => [
                new ListBlock([
                    'Read more about validation in the Spiral Framework: https://spiral.dev/docs/validation-factory',
                    'Documentation: https://spiral.dev/docs/validation-laravel',
                ], $this->getTitle()),
            ],
        ];
    }
}
