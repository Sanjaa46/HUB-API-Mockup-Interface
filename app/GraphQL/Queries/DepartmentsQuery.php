<?php

namespace App\GraphQL\Queries;

use Illuminate\Support\Facades\Log;

class DepartmentsQuery
{
    /**
     * Get all departments
     *
     * @param null $rootValue
     * @param array $args
     * @return array
     */
    public function getDepartments($rootValue, array $args)
    {
        Log::info('GraphQL Query: hr_GetDepartments', $args);
        
        // Get mock department data
        return $this->getMockDepartmentData();
    }
    
    /**
     * Return mock department data
     *
     * @return array
     */
    private function getMockDepartmentData()
    {
        return [
            [
                'id' => '1',
                'name' => 'МКУТ (Математик, Компьютер, Техникийн)',
                'programs' => [
                    [
                        'program_id' => '101',
                        'program_index' => 'D0612345',
                        'program_name' => 'Компьютерийн ухаан'
                    ],
                    [
                        'program_id' => '102',
                        'program_index' => 'D0612346',
                        'program_name' => 'Мэдээллийн системийн удирдлага'
                    ]
                ]
            ],
            [
                'id' => '2',
                'name' => 'Физик Электроникийн',
                'programs' => [
                    [
                        'program_id' => '201',
                        'program_index' => 'D0712345',
                        'program_name' => 'Физик'
                    ]
                ]
            ],
            [
                'id' => '3',
                'name' => 'Биологийн',
                'programs' => [
                    [
                        'program_id' => '301',
                        'program_index' => 'D0812345',
                        'program_name' => 'Биологи'
                    ]
                ]
            ]
        ];
    }
}