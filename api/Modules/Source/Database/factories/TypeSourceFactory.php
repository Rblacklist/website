<?php

namespace Modules\Source\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeSourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Source\Entities\TypeSource::class;

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
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

