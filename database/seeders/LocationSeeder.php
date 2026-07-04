<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::insert([
            [
                'location_name' => 'IT Room - Floor 2',
                'location_description' => 'Information Technology workspace.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Meeting Room A - Floor 3',
                'location_description' => 'Meeting and presentation room.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Server Room - Floor 1',
                'location_description' => 'Server and network equipment.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Finance Office - Floor 4',
                'location_description' => 'Finance department office.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'location_name' => 'Storage Room - Floor 1',
                'location_description' => 'General inventory storage.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
