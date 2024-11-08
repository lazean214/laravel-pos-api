<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Customer::all()->each(function ($customer) {
            $order = Order::factory()->create(['customer_id' => $customer->id]);
            $totalAmount = 0;

            // Create 3-5 order items for each order
            for ($i = 0; $i < rand(3, 5); $i++) {
                $orderItem = OrderItem::factory()->create(['order_id' => $order->id]);
                $totalAmount += $orderItem->price;
            }

            // Update total amount of the order
            $order->update(['total_amount' => $totalAmount]);
        });
    }
}
