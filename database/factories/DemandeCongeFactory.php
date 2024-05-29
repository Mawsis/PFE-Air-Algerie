<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\demandeConge>
 */
class DemandeCongeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $arrayValues = ['en attente', 'approuvée', 'refuse'];
        return [
            'date_debut' => fake()->date(),
            'date_fin' => fake()->date(),
            'status' => $arrayValues[array_rand($arrayValues)],
            'user_id' => User::factory()->create(["direction_id" => 1])->id,
        ];
    }
}
