<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' =>fake()->name(),
            'price' =>fake()->numberBetween('20', '1999000'),
            'description' =>fake()->paragraph(),
            'img' => fake()->image(),
            'quantity' =>fake()->numberBetween('20', '100'),
            'iddm' => '1'

        ];
    }
}
