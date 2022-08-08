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
                'name' => 'Dislub',
                'pin' => '9214',
                'role' => 'ADMIN',
                'email' => 'hernan@dislub.com.ar',
                'phone' => '',
            ],
            [
                'name' => 'Dislub System',
                'pin' => '7777',
                'role' => 'ADMIN',
                'email' => 'paconicolasmiranda@gmail.com',
                'phone' => '+5492235219100',
            ],
        ];

        foreach($organizations as $organization) {
            Organization::updateOrCreate($organization);
        }
    }
}
