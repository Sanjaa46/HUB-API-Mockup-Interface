<?php

namespace App\GraphQL\Queries;

use App\Models\Student;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class StudentsQuery extends Query
{
    protected $attributes = [
        'name' => 'students',
        'description' => 'Get a list of students'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Student'));
    }

    public function args(): array
    {
        return [
            'department_id' => [
                'type' => Type::id(),
                'description' => 'Filter by department ID'
            ],
            'program_id' => [
                'type' => Type::id(),
                'description' => 'Filter by program ID'
            ],
            'has_selected_research' => [
                'type' => Type::boolean(),
                'description' => 'Filter by research selection status'
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $query = Student::query();

        if (isset($args['department_id'])) {
            $query->where('department_id', $args['department_id']);
        }

        if (isset($args['program_id'])) {
            $query->where('program_id', $args['program_id']);
        }

        if (isset($args['has_selected_research'])) {
            $query->where('has_selected_research', $args['has_selected_research']);
        }

        return $query->get();
    }
}   