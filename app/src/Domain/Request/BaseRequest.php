<?php

namespace App\Domain\Request;

interface BaseRequest
{
    public function getRules(): array;
}
