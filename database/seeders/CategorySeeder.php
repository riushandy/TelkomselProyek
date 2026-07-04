<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'category_name' => 'Laptop',
                'category_description' => 'Laptop and notebook devices.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Printer',
                'category_description' => 'Printer devices.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Monitor',
                'category_description' => 'Computer monitors.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Networking',
                'category_description' => 'Networking equipment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
