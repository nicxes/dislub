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
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 2,
              'name' => 'Servicios pesados',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 3,
              'name' => 'Industrias',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 4,
              'name' => 'Marítimo',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 5,
              'name' => 'Motos',
              'type' => 'PRODUCTS',
            ],
            [
              'id' => 6,
              'name' => 'Automotor',
              'type' => 'PRODUCTS',
            ],
        ];

        foreach($categories as $category) {
            Category::updateOrCreate($category);
        }
    }
}
