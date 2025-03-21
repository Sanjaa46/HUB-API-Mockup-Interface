<?php

namespace App\GraphQL\Queries;

use App\Models\Department;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DepartmentsQuery extends Query
{
    protected $attributes = [
        'name' => 'departments',
        'description' => 'Get a list of departments'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Department'));
    }

    public function resolve($root, $args)
    {
        return Department::all();
    }
}