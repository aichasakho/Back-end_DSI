<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appartement>
 */
class AppartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_de_bail' => $this->faker->randomElement(['Villa', 'Appartement', 'Maison', 'Bureau', 'Studio']),
            'nbr_piece' => $this->faker->numberBetween(1, 10),
            'montant_caution' => $this->faker->numberBetween(100000, 5000000),
            'bien_immobilier_id' => $this->faker->numberBetween(1, 10),       
        ];
    }
}
