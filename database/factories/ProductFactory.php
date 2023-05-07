<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'detail' => $this->faker->sentence($nbWords = 10, $variableNbWords = true),
            'price' => $this->faker->numberBetween(120,1200),
            'stock' => $this->faker->numberBetween(1,100),
            'discount' => $this->faker->numberBetween(10,100),
        ];
    }
}
