<?php

namespace App\GraphQL\Types;

use App\Models\Teacher;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TeacherType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Teacher',
        'description' => 'A teacher or staff member',
        'model' => Teacher::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the teacher'
            ],
            'department_id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the department'
            ],
            'department_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the department'
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The first name of the teacher'
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The last name of the teacher'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of the teacher'
            ],
            'phone' => [
                'type' => Type::string(),
                'description' => 'The phone number of the teacher'
            ],
            'position' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The position title of the teacher'
            ],
            'academic_degree' => [
                'type' => Type::string(),
                'description' => 'The academic degree of the teacher'
            ],
            'department' => [
                'type' => GraphQL::type('Department'),
                'description' => 'The department of the teacher',
                'resolve' => function($root, $args) {
                    return $root->department;
                }
            ],
            'students' => [
                'type' => Type::listOf(GraphQL::type('Student')),
                'description' => 'The students advised by this teacher',
                'resolve' => function($root, $args) {
                    return $root->students;
                }
            ],
            'students_count' => [
                'type' => Type::int(),
                'description' => 'The number of students advised by this teacher',
                'resolve' => function($root, $args) {
                    return $root->students()->count();
                }
            ]
        ];
    }
}