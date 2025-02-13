<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            'name' => 'Celular 1',
            'price' => 1800.00,
            'description' => 'Lorenzo Ipsulum'
        ]);
        Product::factory()->create([
            'name' => 'Celular 2',
            'price' => 3200.00,
            'description' => 'Lorem ipsum dolor'
        ]);
        Product::factory()->create([
            'name' => 'Celular 3',
            'price' => 9800.00,
            'description' => 'Lorem ipsum dolor sit amet'
        ]);
    }
}
