<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'role_name' => 'Admin',
                'role_description' => 'Full access to the system.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Staff',
                'role_description' => 'Manage inventory data and borrowing transactions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Manager',
                'role_description' => 'View dashboard and reports.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
