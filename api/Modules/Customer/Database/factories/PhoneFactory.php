<?php

namespace Modules\Customer\Database\factories;

use Modules\Customer\Entities\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Customer\Entities\Phone::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'phone' => fake()->phoneNumber(),
            'code' => "+" . rand(1, 999),
            'customer_id' => Customer::inRandomOrder()->limit(30)->first(),
        ];
    }
}
