<?php

namespace App\GraphQL\Queries;

use App\Models\Teacher;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TeacherQuery extends Query
{
    protected $attributes = [
        'name' => 'teacher',
        'description' => 'Get a teacher by ID'
    ];

    public function type(): Type
    {
        return GraphQL::type('Teacher');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the teacher'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Teacher::findOrFail($args['id']);
    }
}