<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class LoginInputType extends InputType
{
    protected $attributes = [
        'name' => 'LoginInput',
        'description' => 'Login input'
    ];

    public function fields(): array
    {
        return [
            'client_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Client ID'
            ],
            'client_secret' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Client secret'
            ]
        ];
    }
}