<?php

namespace App\Domain\Request;

class UserLoginMobileRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "mobile" => [
                'required',
                ['regexp', '/^0[0-9]{10}$/']
            ],
            "password" => [
                "required",
                ["string::length", 8]
            ]
        ];
    }

}
