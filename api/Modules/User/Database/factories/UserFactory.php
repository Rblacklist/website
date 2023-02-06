<?php

namespace Modules\User\Database\factories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\User\Entities\User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'firstname' => fake()->name(),
            'lastname' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'code' => rand(1, 3),
            'avatar' => fake()->imageUrl($width = 200, $height = 200),
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
        ];
    }
}

