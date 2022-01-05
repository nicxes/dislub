<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Custom data to store.
        $orders = [
            [
                'organization_id' => 1,
            ],
            [
                'organization_id' => 2,
            ],
        ];

        foreach($orders as $order) {
            Order::updateOrCreate($order);
        }
    }
}
