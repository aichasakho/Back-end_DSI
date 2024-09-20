<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Annonce>
 */
class AnnonceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_annonce' => fake()->randomElement(['location', 'vente']),
            'description' => fake()->realText(300),
            'statut' => 'disponible',
            'prix' => fake()->numberBetween(100000, 500000),
            'bien_immobilier_id' => fake()->numberBetween(1, 10),
        ];
    }
}
