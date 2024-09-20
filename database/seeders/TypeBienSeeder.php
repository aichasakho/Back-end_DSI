<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeBienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\TypeBien::factory()->create(
            [
                'type_bien' => 'Immeuble',
            ],
        );

        \App\Models\TypeBien::factory()->create(
            [
                'type_bien' => 'Appartement',
            ],
        );

        \App\Models\TypeBien::factory()->create(
            [
                'type_bien' => 'Maison',
            ],
        );

        \App\Models\TypeBien::factory()->create(
            [
                'type_bien' => 'Terrain',
            ],
        );

        \App\Models\TypeBien::factory()->create(
            [
                'type_bien' => 'Parcelle',
            ],
        );
        
    }
}
