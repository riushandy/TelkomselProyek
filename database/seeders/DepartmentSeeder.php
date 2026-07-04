<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::insert([
            [
                'department_name' => 'Information Technology',
                'department_description' => 'IT Department',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Finance',
                'department_description' => 'Finance Department',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Human Resources',
                'department_description' => 'HR Department',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_name' => 'Marketing',
                'department_description' => 'Marketing Department',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
