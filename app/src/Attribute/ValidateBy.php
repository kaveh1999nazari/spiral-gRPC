<?php

namespace App\Attribute;

use Attribute;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;

#[Attribute(Attribute::TARGET_METHOD), NamedArgumentConstructor]
class ValidateBy
{
    public function __construct(public readonly string $validatorClass){}
}
