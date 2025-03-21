<?php

namespace App\GraphQL\Types;

use App\Models\Program;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ProgramType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Program',
        'description' => 'A academic program',
        'model' => Program::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the program'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the program'
            ],
            'index' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The program index (e.g., D0612345)'
            ],
            'department_id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the department'
            ],
            'department' => [
                'type' => GraphQL::type('Department'),
                'description' => 'The department of the program',
                'resolve' => function($root, $args) {
                    return $root->department;
                }
            ],
            'students' => [
                'type' => Type::listOf(GraphQL::type('Student')),
                'description' => 'The students in this program',
                'resolve' => function($root, $args) {
                    return $root->students;
                }
            ],
            'students_count' => [
                'type' => Type::int(),
                'description' => 'The number of students in this program',
                'resolve' => function($root, $args) {
                    return $root->students()->count();
                }
            ]
        ];
    }
}