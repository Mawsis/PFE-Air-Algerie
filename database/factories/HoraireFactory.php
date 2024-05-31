<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Horaire>
 */
class HoraireFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "heure_debut" => fake()->dateTimeBetween('-4 month', '+4 month'),
            "heure_fin" => fake()->dateTimeBetween('-4 month', '+4 month'),
            "present" => fake()->boolean(),
            "user_id" => 3,
        ];
    }
}
