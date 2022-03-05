<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Enums\UserType;
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
            'user_id' => User::select('id')->where('type', UserType::cus)->inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(OrderStatus::values()),
            'total_price' => $this->faker->randomFloat(2, 100, 9999),
        ];
    }
}
