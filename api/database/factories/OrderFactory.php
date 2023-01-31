<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\DeliveryCompany;
use App\Models\Source;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'source_id' => function(){return Source::inRandomOrder()->first()->id ?? Source::factory()->create()->id;},
            'order_number' => fake()->randomNumber(),
            'client_id' => function(){return Client::inRandomOrder()->first()->id ?? Client::factory()->create()->id;},
            'delivery_type' => fake()->randomElement(['StopDesk', 'Domicile']),
            'Note' => fake()->paragraph(1),
            'delivery_company_id' => function(){return DeliveryCompany::inRandomOrder()->first()->id ?? DeliveryCompany::factory()->create()->id;},
            'EditedBy' => function(){return User::inRandomOrder()->first()->id ?? User::factory()->create()->id;},
            'isSent' => fake()->boolean(),
            'created_at' => now()
        ];
    }
}
