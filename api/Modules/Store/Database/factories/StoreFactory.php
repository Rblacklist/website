<?php

namespace Modules\Store\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Store\Entities\Store::class;

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
            'base_url' => 'http://' . fake()->word,
            'status' => rand(0, 1)
        ];
    }
}

