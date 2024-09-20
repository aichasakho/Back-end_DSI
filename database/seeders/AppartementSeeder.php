<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Appartement::factory()->create(
            [
                'type_de_bail' => 'Appartement',
                'nbr_piece' => 3,
                'montant_caution' => 500000,
                'bien_immobilier_id' => 1,
            ]
        );

        \App\Models\Appartement::factory()->create(
            [
                'type_de_bail' => 'Appartement',
                'nbr_piece' => 3,
                'montant_caution' => 600000,
                'bien_immobilier_id' => 2,
            ]
        );

        \App\Models\Appartement::factory()->create(
            [
                'type_de_bail' => 'Bureau',
                'nbr_piece' => 1,
                'montant_caution' => 500000,
                'bien_immobilier_id' => 2,
            ]
        );
    }
}
