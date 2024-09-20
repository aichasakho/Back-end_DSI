<?php

namespace Database\Factories;

use App\Models\TypeBien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TypeBien>
 */
class TypeBienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_bien' => fake()->word(),
        ];
    }
}
