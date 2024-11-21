<?php

namespace App\Domain\Request;

class ProductStoreRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "name" => ['required', ["string::longer", 2]],
            "description" => ['required', ["string::longer", 5]],
            "images" => ['string'],
            "categoryId" => ['required', 'integer'],
            "price" => ['required', 'string'],
            "options" => ['required', 'array']
        ];
    }
}
