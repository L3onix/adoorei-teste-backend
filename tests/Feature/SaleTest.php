<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_sale_post_endpoint(): void
    {
        $this->seed();
        $json = '{
            "sales_id": "2023010134",
            "products": [
                {
                    "id": 1,
                    "amount": 1
                },
                {
                    "id": 2,
                    "amount": 3
                }
            ]
        }';
        $response = $this->postJson(route('sales.store'), json_decode($json, true));

        $response->assertStatus(201);
    }

    public function test_sale_post_endpoint_invalid_input(): void
    {
        $this->seed();
        $json = '{
            "sales_id": "2023010134",
            "products": [
                {
                    "id": 10,
                    "amount": 1
                },
                {
                    "id": 2,
                    "amount": 3
                }
            ]
        }';
        $response = $this->postJson(route('sales.store'), json_decode($json, true));

        $response->assertStatus(422);
    }
}
