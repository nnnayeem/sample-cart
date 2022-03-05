<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => Product::select('id')->inRandomOrder()->first()->id,
            'order_id' => Order::select('id')->inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 20),
        ];
    }
}
