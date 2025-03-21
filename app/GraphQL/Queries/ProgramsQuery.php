<?php

namespace App\GraphQL\Queries;

use App\Models\Program;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ProgramsQuery extends Query
{
    protected $attributes = [
        'name' => 'programs',
        'description' => 'Get a list of programs'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Program'));
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
        $query = Program::query();

        if (isset($args['department_id'])) {
            $query->where('department_id', $args['department_id']);
        }

        return $query->get();
    }
}