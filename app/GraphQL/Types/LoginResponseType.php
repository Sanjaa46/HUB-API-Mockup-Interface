<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginResponseType extends GraphQLType
{
    protected $attributes = [
        'name' => 'LoginResponse',
        'description' => 'Response for login mutation'
    ];

    public function fields(): array
    {
        return [
            'access_token' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'JWT token'
            ],
            'expires_in' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'Token expiration time in seconds'
            ]
        ];
    }
}