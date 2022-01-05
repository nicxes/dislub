<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Custom data to store.
        $organizations = [
            [
                'name' => 'Lubricentro San Cristobal',
                'pin' => '1234',
                'rank' => 'ADMIN',
                'email' => 'paconicolasmiranda@gmail.com',
                'phone' => '+54 911 5555-5555',
            ],
            [
                'name' => 'VHGarage',
                'pin' => '0303',
                'rank' => 'USER',
                'email' => 'paconicolasmiranda@gmail.com',
                'phone' => '+54 911 5555-5555',
            ],
        ];

        foreach($organizations as $organization) {
            Organization::updateOrCreate($organization);
        }
    }
}
