<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(500000, 1000000),
            'description' => $this->faker->paragraph,
            'img' => $this->faker->image('public/storage/images',480,480, null, false),
        ];
    }
}
