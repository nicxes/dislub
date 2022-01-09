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
                'number' => '3021',
                'organization_id' => 1,
                'total_products' => 70,
            ],
            [
                'number' => '3022',
                'organization_id' => 1,
                'total_products' => 60,
            ],
            [
                'number' => '3023',
                'organization_id' => 1,
                'total_products' => 50,
            ],
            [
                'number' => '3024',
                'organization_id' => 2,
                'total_products' => 51,
            ],
        ];

        foreach($orders as $order) {
            Order::updateOrCreate($order);
        }
    }
}
