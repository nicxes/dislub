<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Custom data to store.
        $products = [
            // Autos
            [
                'name' => 'MOBIL 1 FS X2 5W-50',
                'slug' => 'mobil-1-fs-x2-5w-50',
                'description' => 'Aceite sintético para motores diésel, GNC y nafteros de vehículos livianos. Apto para condiciones extremas de conducción. SAE 5W-50.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL 1 FS 0W-40',
                'slug' => 'mobil-1-fs-0w-40',
                'description' => 'Aceite sintético para motores diésel, GNC y nafteros de vehículos livianos. Apto para condiciones extremas de conducción. SAE 5W-50.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL 1 ESP FORMULA 5W-30',
                'slug' => 'mobil-1-esp-formula-5w-30',
                'description' => 'Aceite sintético para motores de avanzado desempeño, diésel, GNC y nafteros. Larga vida. ACEA C2, C3; MB-Approval 229.51; VW 504 00, 507 00. SAE 5W-30.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL SUPER 3000 D1 0W-20',
                'slug' => 'mobil-super-3000-d1-0w-20',
                'description' => 'Aceite sintético de alto rendimiento diseñado para ayudar al ahorro de combustible en motores nafteros y con GNC de diseño norteamericano y asiático, tanto naturalmente aspirados como turboalimentados. Excede los requisitos de ILSAC GF-5 y API SN. Aprobado por General Motors bajo la especificación dexos1™. SAE 0W-20.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL SUPER 3000 FORMULA D1 5W-30',
                'slug' => 'mobil-super-3000-formula-d1-5w-30',
                'description' => 'Aceite sintético de alto rendimiento diseñado para ayudar a prolongar la vida de motores nafteros y con GNC de diseño norteamericano, tanto naturalmente aspirados como turboalimentados. Excede los requisitos de ILSAC GF-5 y API SN. Aprobado por General Motors bajo la especificación dexos1™. SAE 5W-30.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL SUPER 3000 XE 5W-30',
                'slug' => 'mobil-super-3000-xe-5w-30',
                'description' => 'Aceite sintético de alto rendimiento para motores livianos nafteros, diésel y GNC tanto naturalmente aspirados como turboalimentados, de bajas cenizas, diseñado para ayudar a prolongar la vida y mantener la eficiencia de los sistemas de reducción de emisiones de escape de automóviles (incluye a los Filtros de partículas Diésel o DPF). API SN, ACEA C3, MB-Approval 229,51, GM dexos2™. SAE 5W-30.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL SUPER 3000 X1 5W-40',
                'slug' => 'mobil-super-3000-x1-5w-40',
                'description' => 'Aceite sintético de alto rendimiento para motores nafteros, diésel y GNC tanto naturalmente aspirados como turboalimentados, especialmente diseñado para vehículos europeos, con una mayor protección en un amplio rango de temperaturas. SAE 5W-40. API SN, MB-Approval 229.3.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL SUPER 1000 10W-30',
                'slug' => 'mobil-super-1000-10w-30',
                'description' => 'Aceite para motores nafteros y GNC. Cumple API SL.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL SUPER 1000 X3 15W-40',
                'slug' => 'mobil-super-1000-x3-15w-40',
                'description' => 'Aceite para motores nafteros y GNC. Cumple API SN.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL SUPER 1000 20W-50',
                'slug' => 'mobil-super-1000-20w-50',
                'description' => 'Aceite para motores con kilometraje elevado. Ayuda a controlar el consumo de aceite. SAE 20W-50.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],
            [
                'name' => 'MOBIL ATF D/M',
                'slug' => 'mo-bil-atf-d-m',
                'description' => 'Fluido para transmisiones automáticas y direcciones com asistencia hidráulica. Lubricante con excelente estabilidad a la oxidación, propiedades antidesgaste y fluidez a bajas temperaturas. Recomendado por ExxonMobil para aplicaciones que requieran ATFs Dexron III y/o Mercon.',
                'category_id' => 7,
                'industry' => 'Automotor',
            ],

            // Motos
            [
                'name' => 'MOBIL 1 RACING 4T 15W-50',
                'slug' => 'mobil-1-racing-4t-15w-50',
                'description' => 'Aceite sintético para motores de cuatro tiempos. Posee excepcional nivel de desempeño en motos de alto rendimiento. API SH/ JASO MA2. SAE 15W-50.',
                'category_id' => 11,
                'industry' => 'Motos',
            ],
            [
                'name' => 'MOBIL SUPER MOTO 4T MX AUTHENTIC 10W-30',
                'slug' => 'mobil-super-moto-4t-mx-authentic-10w-30',
                'description' => 'Aceite semisintético de alto desempeño para motores de cuatro tiempos de motocicletas. API SL, JASO MA2. SAE 10W-30.',
                'category_id' => 11,
                'industry' => 'Motos',
            ],
            [
                'name' => 'MOBIL SUPER MOTO 4T MX 10W-40',
                'slug' => 'mobil-super-moto-4t-mx-10w-40',
                'description' => 'Aceite semisintético de alto desempeño para motores de cuatro tiempos de motocicletas. API SL, JASO MA2. SAE 10W-40.',
                'category_id' => 11,
                'industry' => 'Motos',
            ],
            [
                'name' => 'MOBIL SUPER MOTO 4T 20W-50',
                'slug' => 'mobil-super-moto-4t-20w-50',
                'description' => 'Aceite mineral de elevado desempeño para motores de motocicletas con motores 4T. Protege el motor, el embrague y la transmisión. API SL, JASO MA2. SAE 20W-50.',
                'category_id' => 11,
                'industry' => 'Motos',
            ],
            
        ];

        foreach($products as $product) {
            Product::updateOrCreate($product);
        }
    }
}
