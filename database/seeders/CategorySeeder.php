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
              'name' => 'Mineral',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 8,
              'name' => 'Sintético',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 9,
              'name' => 'Semisintético',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 10,
              'name' => 'Hidráulico',
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
              'name' => 'Transporte',
              'type' => 'ORGANIZATIONS',
            ],
            [
              'id' => 16,
              'name' => 'Lubricentro / Taller / Casa de repuestos',
              'type' => 'ORGANIZATIONS',
            ],
            [
              'id' => 17,
              'name' => 'Casa de Motos',
              'type' => 'ORGANIZATIONS',
            ],
            [
              'id' => 18,
              'name' => 'Consumidor Final',
              'type' => 'ORGANIZATIONS',
            ],
            [
              'id' => 19,
              'name' => 'Otro',
              'type' => 'ORGANIZATIONS',
            ],
        ];

        foreach($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
