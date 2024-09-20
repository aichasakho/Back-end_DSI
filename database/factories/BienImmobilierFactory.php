<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BienImmobilierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'type_bien_id' => $this->faker->numberBetween(1, 4),
            'localite_id' => $this->faker->numberBetween(1, 5), 
            'proprietaire_id' => $this->faker->numberBetween(1, 6),
            'agent_id' => $this->faker->numberBetween(1, 6),
            'prix' => $this->faker->numberBetween(100000, 5000000),
        ];
    }
}
