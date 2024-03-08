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

    public function test_sale_get_endpoint_with_id(): void
    {
        $json = '{
            "data": {
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
        }';
        $response = $this->getJson(route('sales.show', ['id' => 1]));
        $response->assertStatus(200)
            ->assertExactJson(json_decode($json, true));
    }

    public function test_sale_delete_endpoint_with_id(): void
    {
        $json = '{
            "message": "Venda excluída com sucesso"
        }';
        $response = $this->deleteJson(route('sales.destroy', ['id' => 1]));
        $response->assertStatus(200)
            ->assertExactJson(json_decode($json, true));
    }

    public function test_sale_put_endpoint_with_id(): void
    {
        $requestJson = '[
            {
                "id": 1,
                "amount": 1
            },
            {
                "id": 2,
                "amount": 3
            },
            {
                "id": 3,
                "amount": 1
            }
        ]';
        $responseJson = '{
            "data": {
                "sales_id": "202301011",
                "amount": 8200,
                "products": [
                    {
                        "id": 1,
                        "name": "Celular 1",
                        "price": 1800,
                        "amount": 2
                    },
                    {
                        "id": 2,
                        "name": "Celular 2",
                        "price": 3200,
                        "amount": 5
                    },
                    {
                        "id": 3,
                        "name": "Celular 3",
                        "price": 9800,
                        "amount": 1
                    }
                ]
            }
        }';
        $response = $this->putJson(route('sales.destroy', ['id' => 1]), json_decode($requestJson, true));
        $response->assertStatus(200)
            ->assertExactJson(json_decode($responseJson, true));
    }
}
