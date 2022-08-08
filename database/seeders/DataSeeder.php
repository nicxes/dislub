<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Organization;
use App\Models\Product;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        //Organization::truncate();

        $csvFile = fopen(base_path("/database/seeders/csvs/organizations.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Organization::create([
                    "pin" => $data['0'],
                    "name" => $data['1'],
                    "phone" => $data['2'],
                    "email" => $data['3'],
                    "role" => $data['4']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

        Product::truncate();

        $csvFile = fopen(base_path("/database/seeders/csvs/products.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Product::create([
                    "name" => $data['0'],
                    "volume" => $data['1'],
                    "industry" => $data['2'],
                    "category_id" => $data['3'],
                    "image" => $data['4'],
                    "description" => $data['5'],
                    //"viscocidad" => $data['6'],
                    "active" => $data['7'],
                    "slug" => $data['8']
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
