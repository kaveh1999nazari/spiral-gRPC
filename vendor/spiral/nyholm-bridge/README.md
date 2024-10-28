# Spiral Framework: Nyholm PSR-7/PSR-17 bridge

[![PHP Version Require](https://poser.pugx.org/spiral/nyholm-bridge/require/php)](https://packagist.org/packages/spiral/nyholm-bridge)
[![Latest Stable Version](https://poser.pugx.org/spiral/nyholm-bridge/v/stable)](https://packagist.org/packages/spiral/nyholm-bridge)
[![phpunit](https://github.com/spiral/nyholm-bridge/actions/workflows/phpunit.yml/badge.svg)](https://github.com/spiral/nyholm-bridge/actions)
[![psalm](https://github.com/spiral/nyholm-bridge/actions/workflows/static-analysis.yml/badge.svg)](https://github.com/spiral/nyholm-bridge/actions)
[![Codecov](https://codecov.io/gh/spiral/nyholm-bridge/branch/master/graph/badge.svg)](https://codecov.io/gh/spiral/nyholm-bridge)
[![Total Downloads](https://poser.pugx.org/spiral/nyholm-bridge/downloads)](https://packagist.org/packages/spiral/nyholm-bridge)
[![type-coverage](https://shepherd.dev/github/spiral/nyholm-bridge/coverage.svg)](https://shepherd.dev/github/spiral/nyholm-bridge)
[![psalm-level](https://shepherd.dev/github/spiral/nyholm-bridge/level.svg)](https://shepherd.dev/github/spiral/nyholm-bridge)

[Framework Bundle](https://github.com/spiral/framework)

## Installation

```
composer require spiral/nyholm-bridge
```

To enable extension modify your application by adding `Spiral\Nyholm\Bootloader\NyholmBootloader`:

```php
class App extends Kernel
{
    /*
     * List of components and extensions to be automatically registered
     * within system container on application start.
     */
    protected const LOAD = [
        // ...
        
        Spiral\Nyholm\Bootloader\NyholmBootloader::class,
    ];
}
```

> **Note**
> Make sure to remove default `Spiral\Bootloader\Http\DiactorosBootloader`.

## License:

MIT License (MIT). Please see [`LICENSE`](./LICENSE) for more information. Maintained by [Spiral Scout](https://spiralscout.com).

