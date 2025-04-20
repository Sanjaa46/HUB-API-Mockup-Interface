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
                        'id' => '101',
                        'index' => 'D0612345',
                        'name' => 'Компьютерийн ухаан'
                    ],
                    [
                        'id' => '102',
                        'index' => 'D0612346',
                        'name' => 'Мэдээллийн системийн удирдлага'
                    ]
                ]
            ],
            [
                'id' => '2',
                'name' => 'Физик Электроникийн',
                'programs' => [
                    [
                        'id' => '201',
                        'index' => 'D0712345',
                        'name' => 'Физик'
                    ]
                ]
            ],
            [
                'id' => '3',
                'name' => 'Биологийн',
                'programs' => [
                    [
                        'id' => '301',
                        'index' => 'D0812345',
                        'name' => 'Биологи'
                    ]
                ]
            ]
        ];
    }
}