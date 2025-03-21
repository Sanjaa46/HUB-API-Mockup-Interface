<?php

namespace App\GraphQL\Types;

use App\Models\Department;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DepartmentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Department',
        'description' => 'A department',
        'model' => Department::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the department'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the department'
            ],
            'programs' => [
                'type' => Type::listOf(GraphQL::type('Program')),
                'description' => 'The programs in this department',
                'resolve' => function($root, $args) {
                    return $root->programs;
                }
            ],
            'teachers' => [
                'type' => Type::listOf(GraphQL::type('Teacher')),
                'description' => 'The teachers in this department',
                'resolve' => function($root, $args) {
                    return $root->teachers;
                }
            ],
            'students' => [
                'type' => Type::listOf(GraphQL::type('Student')),
                'description' => 'The students in this department',
                'resolve' => function($root, $args) {
                    return $root->students;
                }
            ]
        ];
    }
}