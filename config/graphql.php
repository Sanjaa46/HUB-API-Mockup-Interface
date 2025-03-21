<?php

return [
    'route' => [
        'prefix' => '/',
        'controller' => \Rebing\GraphQL\GraphQLController::class . '@query',
        'middleware' => [],
        'group_attributes' => [],
    ],
    
    'default_schema' => 'default',
    
    'schemas' => [
        'default' => [
            'query' => [
                'students' => \App\GraphQL\Queries\StudentsQuery::class,
                'student' => \App\GraphQL\Queries\StudentQuery::class,
                'teachers' => \App\GraphQL\Queries\TeachersQuery::class,
                'teacher' => \App\GraphQL\Queries\TeacherQuery::class,
                'departments' => \App\GraphQL\Queries\DepartmentsQuery::class,
                'department' => \App\GraphQL\Queries\DepartmentQuery::class,
                'programs' => \App\GraphQL\Queries\ProgramsQuery::class
            ],
            'mutation' => [
                'login' => \App\GraphQL\Mutations\LoginMutation::class
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],
    
    'types' => [
        'Student' => \App\GraphQL\Types\StudentType::class,
        'Teacher' => \App\GraphQL\Types\TeacherType::class,
        'Department' => \App\GraphQL\Types\DepartmentType::class,
        'Program' => \App\GraphQL\Types\ProgramType::class,
        'LoginInput' => \App\GraphQL\Types\LoginInputType::class,
        'LoginResponse' => \App\GraphQL\Types\LoginResponseType::class,
    ],
];