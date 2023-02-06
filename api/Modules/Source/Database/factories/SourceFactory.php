<?php

namespace Modules\Source\Database\factories;

use Modules\Source\Entities\TypeSource;
use Illuminate\Database\Eloquent\Factories\Factory;

class SourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Source\Entities\Source::class;

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
            'status' => 1,
            'type_source_id' => TypeSource::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

