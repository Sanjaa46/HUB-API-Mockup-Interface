<?php

return [
    'route' => [
        'uri' => 'graphql',
        'middleware' => ['api'],
    ],
    'schema' => [
        'register' => base_path('graphql/schema.graphql'),
    ],
    'debug' => env('APP_DEBUG', false),
];