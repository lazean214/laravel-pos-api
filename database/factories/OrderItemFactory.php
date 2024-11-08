<?php

namespace Database\Factories;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition(): array
    {
        $medicine = Medicine::inRandomOrder()->first() ?? Medicine::factory()->create();
        $quantity = $this->faker->numberBetween(1, 10);
        $price = $medicine->price;

        return [
            'order_id' => Order::inRandomOrder()->first()->id ?? Order::factory(),
            'medicine_id' => $medicine->id,
            'quantity' => $quantity,
            'price' => $price * $quantity,
        ];
    }
}
