<?php

namespace App\GraphQL\Queries;

use App\Models\Teacher;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TeachersQuery extends Query
{
    protected $attributes = [
        'name' => 'teachers',
        'description' => 'Get a list of teachers'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Teacher'));
    }

    public function args(): array
    {
        return [
            'department_id' => [
                'type' => Type::id(),
                'description' => 'Filter by department ID'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $query = Teacher::query();

        if (isset($args['department_id'])) {
            $query->where('department_id', $args['department_id']);
        }

        return $query->get();
    }
}