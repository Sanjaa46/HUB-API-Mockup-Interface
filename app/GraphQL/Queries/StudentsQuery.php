<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Log;

class StudentsQuery
{
    /**
     * Get a single student by public hash
     *
     * @param null $rootValue
     * @param array $args
     * @return array|null
     */
    public function getStudentInfo($rootValue, array $args)
    {
        Log::info('GraphQL Query: sisi_GetStudentInfo', $args);
        
        // Get the public hash from arguments
        $publicHash = $args['publicHash'] ?? '';
        
        // Mock data - we'll pretend this student has this public hash
        $students = $this->getMockStudentData();
        
        // In a real system, we would look up by the public hash
        // For this mock, we'll just return the first student
        return $students[0] ?? null;
    }
    
    /**
     * Get a list of students with pagination
     *
     * @param null $rootValue
     * @param array $args
     * @return array
     */
    public function getStudentsInfo($rootValue, array $args)
    {
        Log::info('GraphQL Query: sisi_GetStudentsInfo', $args);
        
        $skip = $args['skip'] ?? 0;
        $take = $args['take'] ?? 10;
        
        // Get mock student data
        $students = $this->getMockStudentData();
        
        // Apply pagination
        return array_slice($students, $skip, $take);
    }
    
    /**
     * Get students enrolled in thesis course
     *
     * @param null $rootValue
     * @param array $args
     * @return array
     */
    public function getStudentsEnrolledInThesis($rootValue, array $args)
    {
        Log::info('GraphQL Query: sisi_GetStudentsEnrolledInThesis', $args);
        
        $departmentId = $args['departmentId'] ?? null;
        
        // Get mock student data
        $students = $this->getMockStudentData();
        
        // Filter by department ID only if provided
        if ($departmentId) {
            $students = array_filter($students, function ($student) use ($departmentId) {
                return $student['department_id'] === $departmentId;
            });
        }
        
        // For this mock, we'll pretend all students with has_selected_research=true
        // are enrolled in the thesis course
        $students = array_filter($students, function ($student) {
            return $student['has_selected_research'] === true;
        });
        
        return array_values($students);
    }
    
    /**
     * Return mock student data
     *
     * @return array
     */
    private function getMockStudentData()
    {
        return [
            [
                'sisi_id' => '21B1NUM0435',
                'first_name' => 'Намдаг',
                'last_name' => 'Гантулга',
                'student_email' => '21b1num0435@stud.num.edu.mn',
                'personal_email' => 'namdag.gantulga@gmail.com',
                'program_name' => 'Компьютерийн ухаан',
                'program_id' => '101',
                'phone' => '88112233',
                'department_id' => '1',
                'has_selected_research' => true
            ],
            [
                'sisi_id' => '21B1NUM0436',
                'first_name' => 'Очир',
                'last_name' => 'Пүрэв',
                'student_email' => '21b1num0436@stud.num.edu.mn',
                'personal_email' => 'ochir.purev@gmail.com',
                'program_name' => 'Компьютерийн ухаан',
                'program_id' => '101',
                'phone' => '88223344',
                'department_id' => '1',
                'has_selected_research' => true
            ],
            [
                'sisi_id' => '21B1NUM0437',
                'first_name' => 'Сүхээ',
                'last_name' => 'Батаа',
                'student_email' => '21b1num0437@stud.num.edu.mn',
                'personal_email' => 'sukhee.bataa@gmail.com',
                'program_name' => 'Мэдээллийн системийн удирдлага',
                'program_id' => '102',
                'phone' => '88334455',
                'department_id' => '1',
                'has_selected_research' => true
            ],
            [
                'sisi_id' => '21B1NUM0438',
                'first_name' => 'Мөнх',
                'last_name' => 'Цэцэг',
                'student_email' => '21b1num0438@stud.num.edu.mn',
                'personal_email' => 'munkh.tsetseg@gmail.com',
                'program_name' => 'Мэдээллийн системийн удирдлага',
                'program_id' => '102',
                'phone' => '88445566',
                'department_id' => '1',
                'has_selected_research' => false
            ],
            [
                'sisi_id' => '21B1NUM0439',
                'first_name' => 'Золжаргал',
                'last_name' => 'Дулам',
                'student_email' => '21b1num0439@stud.num.edu.mn',
                'personal_email' => 'zoljargal.dulam@gmail.com',
                'program_name' => 'Физик',
                'program_id' => '201',
                'phone' => '88556677',
                'department_id' => '2',
                'has_selected_research' => true
            ]
        ];
    }
}