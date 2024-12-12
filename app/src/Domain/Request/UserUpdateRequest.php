<?php

namespace App\Domain\Request;

class UserUpdateRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "firstName" => [
                ['string::longer', 2]
            ],

            "lastName" => [
                ['string::longer', 2]
            ],

            'mobile' => [
                ['regexp', '/^0[0-9]{10}$/'],
            ],

            "email" => [
                ['regexp', '/^[A-Za-z0-9._%+-]+@[A-Za-z.-]+\.[a-zA-Z]{2,}$/']
            ],

            'password' => [
                ['string::longer', 5],
                ['string::shorter', 10],
            ],

            "fatherName" => [
                ['string::longer', 2]
            ],

            "nationalCode" => [
                ['regexp', '/[0-9]{10}$/'],
            ],

            "birthDate" => [
                ['regexp', '/^\d{4}-\d{2}-\d{2}$/'],
            ],

            "picture" => [
                ['regexp', '/\.(jpg|jpeg|png|gif)$/i']
            ],

            "code" => [
                "required"
            ]
        ];
    }

}
