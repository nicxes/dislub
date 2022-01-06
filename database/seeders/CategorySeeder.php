<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Custom data to store.
        $categories = [
            [
              'id' => 1,
              'name' => 'Aviación',
              'type' => 'INDUSTRY',
            ],
            [
              'id' => 2,
              'name' => 'Servicios pesados',
              'type' => 'INDUSTRY',
            ],
            [
              'id' => 3,
              'name' => 'Industrias',
              'type' => 'INDUSTRY',
            ],
            [
              'id' => 4,
              'name' => 'Marítimo',
              'type' => 'INDUSTRY',
            ],
            [
              'id' => 5,
              'name' => 'Motos',
              'type' => 'INDUSTRY',
            ],
            [
              'id' => 6,
              'name' => 'Automotor',
              'type' => 'INDUSTRY',
            ],

            // Products
            [
              'id' => 7,
              'name' => 'Lubricante mineral',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 8,
              'name' => 'Lubricante sintético',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 9,
              'name' => 'Lubricante semisintético',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 10,
              'name' => 'Lubricante hidráulico',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 11,
              'name' => 'Grasa',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 12,
              'name' => 'Refrigerante',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 13,
              'name' => 'Urea',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 14,
              'name' => 'Otro',
              'type' => 'PRODUCTS',
            ],

            // Organizations
            [
              'id' => 15,
              'name' => 'Lubricentros',
              'type' => 'ORGANIZATIONS',
            ],
        ];

        foreach($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
