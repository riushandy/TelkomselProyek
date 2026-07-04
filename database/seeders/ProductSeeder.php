<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            [
                'product_name' => 'Laptop Dell Latitude 5420',
                'category_id' => 1,
                'department_id' => 1,
                'location_id' => 1,
                'stock' => 8,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Laptop operasional staff'
            ],

            [
                'product_name' => 'Laptop Lenovo ThinkPad E14',
                'category_id' => 1,
                'department_id' => 2,
                'location_id' => 1,
                'stock' => 5,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Laptop divisi Finance'
            ],

            [
                'product_name' => 'Monitor LG 24 Inch',
                'category_id' => 2,
                'department_id' => 1,
                'location_id' => 2,
                'stock' => 12,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Monitor IPS Full HD'
            ],

            [
                'product_name' => 'Keyboard Logitech K120',
                'category_id' => 3,
                'department_id' => 2,
                'location_id' => 2,
                'stock' => 30,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Keyboard USB'
            ],

            [
                'product_name' => 'Mouse Logitech M185',
                'category_id' => 3,
                'department_id' => 2,
                'location_id' => 2,
                'stock' => 25,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Wireless Mouse'
            ],

            [
                'product_name' => 'Projector Epson EB-X06',
                'category_id' => 4,
                'department_id' => 3,
                'location_id' => 3,
                'stock' => 3,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Projector Meeting'
            ],

            [
                'product_name' => 'Printer HP LaserJet',
                'category_id' => 4,
                'department_id' => 4,
                'location_id' => 3,
                'stock' => 6,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Printer kantor'
            ],

            [
                'product_name' => 'Scanner Canon Lide 300',
                'category_id' => 4,
                'department_id' => 4,
                'location_id' => 3,
                'stock' => 4,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Scanner dokumen'
            ],

            [
                'product_name' => 'Webcam Logitech C920',
                'category_id' => 4,
                'department_id' => 1,
                'location_id' => 4,
                'stock' => 10,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Webcam meeting'
            ],

            [
                'product_name' => 'Speaker Logitech Z213',
                'category_id' => 4,
                'department_id' => 3,
                'location_id' => 4,
                'stock' => 7,
                'product_condition' => 'Good',
                'product_status' => 'Available',
                'product_description' => 'Speaker multimedia'
            ],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
