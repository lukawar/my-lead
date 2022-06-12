<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $netto_price = $this->faker->numberBetween(100, 1000000);
        $tax = $this->faker->numberBetween(1, 23);
        return [
            'description' => $this->faker->realTextBetween(20, 50),
            'netto_price' => $netto_price,
            'gross_price' => ($netto_price * ($tax/100)) + $netto_price,
            'tax' => $tax,
            'condition' => 1
        ];
    }
}
