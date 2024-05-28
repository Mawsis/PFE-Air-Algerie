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
        return [
            "valide" => fake()->boolean,
            "user_id" => 3,
            "horaire_id" => Horaire::factory()->create()->id,
        ];
    }
}
