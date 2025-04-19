<?php


return [
    'paths' => ['graphql', 'gateway'],
    'allowed_origins' => ['*'], // For development, restrict this in production
    'allowed_methods' => ['*'],
    'allowed_headers' => ['Content-Type', 'Authorization'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];