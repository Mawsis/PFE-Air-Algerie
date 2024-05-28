<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\soldeConge>
 */
class SoldeCongeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'annee' => fake()->year(),
            'jours_total' => '30',
            'jours_consommes' => '0',
            'user_id' => 1
        ];
    }
}
