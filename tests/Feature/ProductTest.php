<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_get_endpoint(): void
    {
        $this->seed();
        $response = $this->getJson(route('products.index'));
        $response->assertStatus(200);
    }
}
