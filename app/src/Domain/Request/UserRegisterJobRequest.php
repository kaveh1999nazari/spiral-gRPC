<?php

namespace App\Domain\Request;

class UserRegisterJobRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "user" => [
                'required',
            ],

            "province" => [
                'required',
            ],

            'city' => [
                'required',
            ],

            "title" => [
                'required',
                ["string::longer", 2]
            ],

            'phone' => [
                'required',
                ['regexp', '/^0[0-9]{9}$/']
            ],

            "postal_code" => [
                ['regexp', '/[0-9]{10}$/']
            ],

            "address" => [
                ["string::longer", 2]
            ],

            "monthly_salary" => [
                'float',
            ],
            "work_experience_duration" => [
                'integer',
            ],
            "work_type" => [
                'float',
            ],
            "contract_type" => [
                ["string::longer", 2]
            ]
        ];
    }

}
