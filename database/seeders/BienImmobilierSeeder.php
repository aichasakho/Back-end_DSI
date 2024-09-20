<?php

namespace Database\Seeders;

use App\Models\BienImmobilier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BienImmobilierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BienImmobilier::factory()->create(
            [
                'type_bien_id' => 1,
                'localite_id' => 1,
                'proprietaire_id' => 2,
                'agent_id' => 1,
                'prix' => 100000,
                'nom_immeuble' => 'Immeuble 1',
                'nbr_etage' => 4,
                'date_construction' => '2022-01-01',
                'etat' => true,
            ],
        );

        BienImmobilier::factory()->create(
            [
                'type_bien_id' => 2,
                'localite_id' => 2,
                'proprietaire_id' => 3,
                'agent_id' => 1,
                'prix' => 100000,
                'nom_immeuble' => 'Immeuble 2',
                'nbr_etage' => 4,
                'date_construction' => '2002-01-01',
                'etat' => true,
            ],
        );


        BienImmobilier::factory()->create(
            [
                'superficie' => 1500,
                'nbr_piece' => 7,
                'type_bien_id' => 4,
                'prix' => 100000,
                'proprietaire_id' => 2,
                'localite_id' => 1,
                'agent_id' => 1,
                'etat' => true,



            ],
        );

        BienImmobilier::factory()->create(
            [

                'type_bien_id' => 4,
                'localite_id' => 2,
                'proprietaire_id' => 5,
                'agent_id' => 1,
                'prix' => 150000,
                'prix_achat' => 100000,
                'etat' => true,

            ],
        );

        BienImmobilier::factory()->create(
            [

                'type_bien_id' => 5,
                'localite_id' => 2,
                'proprietaire_id' => 2,
                'agent_id' => 1,
                'prix' => 150000,
                'prix_achat' => 100000,
                'etat' => true,

            ],
        );


    }
}
