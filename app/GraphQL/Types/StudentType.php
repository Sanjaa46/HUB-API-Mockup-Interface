<?php

namespace App\GraphQL\Types;

use App\Models\Student;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class StudentType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Student',
        'description' => 'A student',
        'model' => Student::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the student'
            ],
            'sisi_id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The SISI ID of the student'
            ],
            'first_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The first name of the student'
            ],
            'last_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The last name of the student'
            ],
            'student_email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The student email (@stud.num.edu.mn)'
            ],
            'personal_email' => [
                'type' => Type::string(),
                'description' => 'The personal email of the student'
            ],
            'program_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the student\'s program'
            ],
            'program_id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the student\'s program'
            ],
            'phone' => [
                'type' => Type::string(),
                'description' => 'The phone number of the student'
            ],
            'department_id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'The ID of the student\'s department'
            ],
            'has_selected_research' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Whether the student has selected a research project'
            ],
            'department' => [
                'type' => GraphQL::type('Department'),
                'description' => 'The department of the student',
                'resolve' => function($root, $args) {
                    return $root->department;
                }
            ],
            'program' => [
                'type' => GraphQL::type('Program'),
                'description' => 'The program of the student',
                'resolve' => function($root, $args) {
                    return $root->program;
                }
            ]
        ];
    }
}