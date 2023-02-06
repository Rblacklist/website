<?php

namespace Modules\DeliveryCompany\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\DeliveryCompany\Entities\DeliveryCompany::class;

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
            'base_url' => fake()->url,
            'api_secret' => '87MJFJ9390RJDKF098390MKJDF0983MJK9F8D'
        ];
    }
}

