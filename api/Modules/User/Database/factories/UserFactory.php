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
            'avatar' => 'https://avatars.dicebear.com/v2/male/3397358c1ca2bbec334d847e4414376a.svg',
            'email' => fake()->unique()->safeEmail(),
            'code' => rand(1, 3),
            'phone' => '0662000000',
            'avatar' => fake()->imageUrl($width = 200, $height = 200),
            'password' => Hash::make(123456789),
            'email_verified_at' => now(),
        ];
    }
}
