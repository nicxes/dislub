<?php

namespace Database\Seeders;

use App\Models\OrderProduct;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Custom data to store.
        $ordersProducts = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 10,
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 20,
            ],
            [
                'order_id' => 1,
                'product_id' => 3,
                'quantity' => 30,
            ],

            // Second Order
            [
                'order_id' => 2,
                'product_id' => 4,
                'quantity' => 50,
            ],
            [
                'order_id' => 2,
                'product_id' => 4,
                'quantity' => 1,
            ],
        ];

        foreach($ordersProducts as $orderProduct) {
            OrderProduct::updateOrCreate($orderProduct);
        }
    }
}
