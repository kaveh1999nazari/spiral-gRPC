<?php

namespace App\Domain\Request;

class UserUpdateResidentRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [

            "id" => [
                "required"
            ],

            "user" => [
                "required"
            ],

            'address' => [
                ["string::longer", 2]
            ],

            "postalCode" => [
                ['regexp', '/[0-9]{10}$/'],
            ],

            "province" => [
            ],

            'city' => [
            ],

            "code" => [
                "required"
            ]
        ];
    }

}
