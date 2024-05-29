<?php

namespace Database\Factories;

use App\Models\Horaire;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\absence>
 */
class AbsenceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ["absence", "retard"];
        return [
            "valide" => fake()->boolean,
            "user_id" => 3,
            "type" => $types[array_rand($types)],
            "horaire_id" => Horaire::factory()->create()->id,
        ];
    }
}
