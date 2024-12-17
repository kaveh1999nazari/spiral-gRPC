<?php

namespace App\Domain\Request;

class ProductSearchRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            'name' => ['required']
        ];
    }

}
