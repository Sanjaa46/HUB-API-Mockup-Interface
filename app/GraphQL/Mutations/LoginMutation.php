<?php

namespace App\GraphQL\Mutations;

use App\Models\Token;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LoginMutation extends Mutation
{
    protected $attributes = [
        'name' => 'login',
        'description' => 'Authenticate client and get access token'
    ];

    public function type(): Type
    {
        return GraphQL::type('LoginResponse');
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('LoginInput'),
                'description' => 'Login credentials'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $input = $args['input'];
        
        // In a real scenario, you'd validate these against a database
        // For this mockup, we'll accept any credentials
        $clientId = $input['client_id'];
        $clientSecret = $input['client_secret'];
        
        // Generate a token (in a real system, this would be a JWT)
        $token = Str::random(60);
        $expiresIn = 3600; // 1 hour
        
        // Store the token
        Token::create([
            'client_id' => $clientId,
            'access_token' => $token,
            'expires_at' => Carbon::now()->addSeconds($expiresIn)
        ]);
        
        return [
            'access_token' => $token,
            'expires_in' => $expiresIn
        ];
    }
}