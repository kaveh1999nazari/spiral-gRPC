<?php

namespace App\Domain\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class AuthenticatedBy
{
    public function __construct(public array $rule = []){}
}
