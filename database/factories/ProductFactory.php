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
    public function definition()
    {
        return [
            'name' => $this->faker->realTextBetween(20, 100),
            'short_description' => $this->faker->realTextBetween(20, 255),
            'long_description' => $this->faker->randomHtml()
        ];
    }
}
