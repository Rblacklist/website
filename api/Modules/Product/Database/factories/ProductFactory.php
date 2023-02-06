<?php

namespace Modules\Product\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Product\Entities\Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => fake()->word,
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000),
            'quantity' => fake()->randomDigit,
            'weight' => fake()->randomDigit,
        ];
    }
}

