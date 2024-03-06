<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // TODO poderia adicionar uma forma de receber uma lista de produtos para que a Sale fosse criada já com o registro de lista de produtos
        return [
            'sales_id' => fake()->unique()->regexify('[0-9]{9}'),
            'total_price' => fake()->randomFloat(2)
        ];
    }
}
