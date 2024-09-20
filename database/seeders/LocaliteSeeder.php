<?php

namespace Database\Seeders;

use App\Models\Localite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocaliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Localite::factory()->create(
            [
                'ville' => 'Dakar',
                'region' => 'Dakar',
                'quartier' => 'Fass',
            ]
        );

        Localite::factory()->create(
            [
                'ville' => 'Dakar',
                'region' => 'Dakar',
                'quartier' => 'Sacre Coeur',
            ]
        );

        Localite::factory()->create(
            [
                'ville' => 'Dakar',
                'region' => 'Dakar',
                'quartier' => 'Rufisque',
            ]
        );

        Localite::factory()->create(
            [
                'ville' => 'Dakar',
                'region' => 'Dakar',
                'quartier' => 'Keur Massar',
            ]
        );

        Localite::factory()->create(
            [
                'ville' => 'Dakar',
                'region' => 'Dakar',
                'quartier' => 'HLM',
            ]
        );

        Localite::factory()->create(
            [
                'ville' => 'Dakar',
                'region' => 'Dakar',
                'quartier' => 'Liberte 6',
            ]
        );
    }
}
