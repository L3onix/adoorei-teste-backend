<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SaleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_sale_post_endpoint(): void
    {
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

    public function test_sale_get_endpoint(): void
    {
        $json = '{
            "data": [
                {
                    "sales_id": "202301011",
                    "amount": 8200,
                    "products": [
                        {
                            "id": 1,
                            "name": "Celular 1",
                            "price": 1800,
                            "amount": 1
                        },
                        {
                            "id": 2,
                            "name": "Celular 2",
                            "price": 3200,
                            "amount": 2
                        }
                    ]
                }
            ]
        }';
        $response = $this->getJson(route('sales.index'));
        $response->assertStatus(200)
            ->assertExactJson(json_decode($json, true));
    }
}
