<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Annonce::factory()->create(
            [
                'type_annonce' => 'location',
                'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
                'statut' => 'disponible',
                'prix' => 150000,
                'bien_immobilier_id' => 2,
            ]
        );

        \App\Models\Annonce::factory()->create(
            [
                'type_annonce' => 'location',
                'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
                'statut' => 'disponible',
                'prix' => 180000,
                'bien_immobilier_id' => 2,
            ]
        );

        \App\Models\Annonce::factory()->create(
            [
                'type_annonce' => 'vente',
                'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
                'statut' => 'disponible',
                'prix' => 200000,
                'bien_immobilier_id' => 2,
            ]
        );

      \App\Models\Annonce::factory()->create(
        [
          'type_annonce' => 'vente',
          'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
          'statut' => 'disponible',
          'prix' => 250000,
          'bien_immobilier_id' => 2,
        ]
      );

      \App\Models\Annonce::factory()->create(
        [
          'type_annonce' => 'location',
          'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
          'statut' => 'disponible',
          'prix' => 280000,
          'bien_immobilier_id' => 2,
        ]
      );

      \App\Models\Annonce::factory()->create(
        [
          'type_annonce' => 'vente',
          'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
          'statut' => 'disponible',
          'prix' => 300000,
          'bien_immobilier_id' => 2,
        ]
      );

      \App\Models\Annonce::factory()->create(
        [
          'type_annonce' => 'location',
          'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
          'statut' => 'disponible',
          'prix' => 100000,
          'bien_immobilier_id' => 2,
        ]
      );

      \App\Models\Annonce::factory()->create(
        [
          'type_annonce' => 'vente',
          'description' => "Charmant appartement T3 idéalement situé au cœur de la ville, dans un quartier prisé et animé. Ce bien lumineux offre une surface de 75 m² avec de beaux volumes. Il se compose de deux chambres spacieuses, d’un salon/salle à manger confortable, ainsi que d’une cuisine indépendante entièrement équipée. La salle de bain moderne dispose d’une baignoire. Vous apprécierez également un balcon orienté plein sud offrant une vue dégagée sur la ville.
                    L’appartement bénéficie d’un parquet en chêne massif, de double vitrage et d’une isolation thermique et phonique de qualité. Une cave privative est également incluse, avec possibilité de stationnement en supplément. L'emplacement, à proximité des commerces, écoles et transports, en fait un lieu de vie idéal pour les citadins à la recherche de confort et de praticité.",
          'statut' => 'disponible',
          'prix' => 90000,
          'bien_immobilier_id' => 2,
        ]
      );
    }
}
