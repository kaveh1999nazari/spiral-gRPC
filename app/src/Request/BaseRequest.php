<?php

namespace App\Request;

interface BaseRequest
{
    public function getRules(): array;
}
