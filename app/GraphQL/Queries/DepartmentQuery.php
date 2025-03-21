<?php

namespace App\GraphQL\Queries;

use App\Models\Department;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DepartmentQuery extends Query
{
    protected $attributes = [
        'name' => 'department',
        'description' => 'Get a department by ID'
    ];

    public function type(): Type
    {
        return GraphQL::type('Department');
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the department'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Department::findOrFail($args['id']);
    }
}