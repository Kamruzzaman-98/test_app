<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'  => fake()->words(3, true),
            'sku' => strtoupper(fake()->bothify('SKU-#####')),
            'price' => fake()->randomFloat(2, 10, 5000),
        ];
    }
}
