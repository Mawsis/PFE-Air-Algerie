<?php

namespace Database\Seeders;

use App\Models\DemandeConge;
use App\Models\Direction;
use App\Models\SoldeConge;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $direction = Direction::factory()->create();

        User::factory()->create([
            'nom' => 'Chef',
            'email' => 'chef@example.com',
            'status' => 'admin',
            'direction_id' => $direction->id,
        ]);
        $employee = User::factory()->create([
            'nom' => 'user',
            'email' => 'user@example.com',
            'status' => 'employee',
            'direction_id' => $direction->id,
        ]);
        DemandeConge::factory(4)->create([
            'date_debut' => '2024-05-28',
            'date_fin' => '2024-05-28',
            'status' => 'en attente',
            'user_id' => $employee->id,
        ]);
        SoldeConge::factory()->create([
            'user_id' => $employee->id,
            'annee' => '2024',
        ]);
        SoldeConge::factory()->create([
            'user_id' => $employee->id,
            'annee' => '2025',
        ]);
    }
}
