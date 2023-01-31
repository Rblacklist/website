<?php

namespace Database\Factories;

use App\Models\TypeSource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Source>
 */
class SourceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'baseurl' => fake()->url(),
            'type_source_id' => function(){return TypeSource::inRandomOrder()->first()->id ?? TypeSource::factory()->create()->id;},
        ];
    }
}
