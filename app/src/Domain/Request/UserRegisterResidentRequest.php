<?php

namespace App\Domain\Request;

class UserRegisterResidentRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "user" => [
                "required"
            ],

            'address' => [
                'required',
                ["string::longer", 2]
            ],

            "postalCode" => [
                'required',
                ['regexp', '/[0-9]{10}$/'],
            ],

            "province" => [
                "required"
            ],

            'city' => [
                'required'
            ],
        ];
    }
}
