<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Log;

class TeachersQuery
{
    /**
     * Get teachers with optional department filter
     *
     * @param null $rootValue
     * @param array $args
     * @return array
     */
    public function getTeachers($rootValue, array $args)
    {
        Log::info('GraphQL Query: hr_GetTeachers', $args);
        
        $departmentId = $args['departmentId'] ?? null;
        
        // Get mock teacher data
        $teachers = $this->getMockTeacherData();
        
        // Filter by department ID if provided
        if ($departmentId) {
            $teachers = array_filter($teachers, function ($teacher) use ($departmentId) {
                return $teacher['dep_id'] === $departmentId;
            });
        }
        
        return array_values($teachers);
    }
    
    /**
     * Return mock teacher data
     *
     * @return array
     */
    private function getMockTeacherData()
    {
        return [
            [
                'id' => 'T1001',
                'dep_id' => '1',
                'department_name' => 'МКУТ (Математик, Компьютер, Техникийн)',
                'firstname' => 'Бат',
                'lastname' => 'Дорж',
                'mail' => 'bat.dorj@num.edu.mn',
                'phone' => '99112233',
                'position' => 'Профессор',
                'academic_degree' => 'Доктор (Ph.D)'
            ],
            [
                'id' => 'T1002',
                'dep_id' => '1',
                'department_name' => 'МКУТ (Математик, Компьютер, Техникийн)',
                'firstname' => 'Болд',
                'lastname' => 'Сүхбаатар',
                'mail' => 'bold.sukhbaatar@num.edu.mn',
                'phone' => '99223344',
                'position' => 'Дэд профессор',
                'academic_degree' => 'Магистр'
            ],
            [
                'id' => 'T2001',
                'dep_id' => '2',
                'department_name' => 'Физик Электроникийн',
                'firstname' => 'Золбоо',
                'lastname' => 'Дамдин',
                'mail' => 'zolboo.damdin@num.edu.mn',
                'phone' => '99334455',
                'position' => 'Ахлах багш',
                'academic_degree' => 'Доктор (Ph.D)'
            ]
        ];
    }
}