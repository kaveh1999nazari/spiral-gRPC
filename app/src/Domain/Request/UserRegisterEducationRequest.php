<?php

namespace App\Domain\Request;

class UserRegisterEducationRequest implements BaseRequest
{
    public function getRules(): array
    {
        return [
            "user" => [
                "required"
            ],

            'university' => [
                'required',
                ["string::longer", 2]
            ],

            "degree" => [
                'required',
            ],

            "educationFile" => [
                ['regexp', '/\.(jpg|jpeg|png|gif)$/i']
            ]

        ];
    }

}
