<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AuthMutation
{
    /**
     * Handle login mutation
     *
     * @param null $rootValue
     * @param array $args
     * @return array
     */
    public function login($rootValue, array $args)
    {
        Log::info('GraphQL Mutation: login', [
            'client_id' => $args['input']['client_id'] ?? null,
            // Don't log client_secret for security reasons
        ]);
        
        // In a real system, we would validate the client_id and client_secret
        // For this mock, we'll accept any non-empty values
        $clientId = $args['input']['client_id'] ?? '';
        $clientSecret = $args['input']['client_secret'] ?? '';
        
        if (empty($clientId) || empty($clientSecret)) {
            // We should throw a GraphQL exception here
            // But for simplicity in the mock, we'll just return a dummy token
            Log::warning('Login attempt with empty credentials');
        }
        
        // Generate a token
        $token = Str::random(60);
        $expiresIn = 3600; // 1 hour
        
        return [
            'access_token' => $token,
            'expires_in' => $expiresIn
        ];
    }
}