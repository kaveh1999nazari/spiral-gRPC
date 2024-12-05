<?php

namespace App\Domain\Request;

class UserLoginOTPRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "email" => [
                'required',
                ['regexp', '/^[A-Za-z0-9._%+-]+@[A-Za-z.-]+\.[a-zA-Z]{2,}$/']
            ],
            "code" => [
                "required",
                ["string::length", 6]
            ]
        ];
    }
}
