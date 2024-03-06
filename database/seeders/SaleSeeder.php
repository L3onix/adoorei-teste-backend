<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sale = Sale::factory()->create([
            'sales_id' => '202301011',
            'total_price' => 8200
        ]);
        $sale->products()->save(Product::find(1), ['amount' => 1]);
        $sale->products()->save(Product::find(2), ['amount' => 2]);
    }
}
