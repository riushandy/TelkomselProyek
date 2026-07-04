<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@telkomsel.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 2,
            'name' => 'Staff User',
            'email' => 'staff@telkomsel.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'role_id' => 3,
            'name' => 'Manager User',
            'email' => 'manager@telkomsel.com',
            'password' => Hash::make('password'),
        ]);
    }
}
