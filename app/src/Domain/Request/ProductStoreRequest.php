<?php

namespace App\Domain\Request;


use App\Domain\Entity\Option;
use Cycle\ORM\ORMInterface;

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
            "options" => ['required', 'array', function ($values) {
//                print_r($values);
//                foreach ($values as $key => $value)
//                {
//                    print_r($key);
//                }
                return true;
            }],
        ];
    }
}
