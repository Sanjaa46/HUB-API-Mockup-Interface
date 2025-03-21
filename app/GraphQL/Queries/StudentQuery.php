<?php

namespace App\GraphQL\Queries;

use App\Models\Student;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class StudentQuery extends Query
{
    protected $attributes = [
        'name' => 'student',
        'description' => 'Get a student by ID'
    ];

    public function type(): Type
    {
        return GraphQL::type('Student');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the student'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Student::findOrFail($args['id']);
    }
}