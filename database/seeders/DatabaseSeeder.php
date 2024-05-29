<?php

namespace Database\Seeders;

use App\Models\Absence;
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

        $chef = User::factory()->create([
            'email' => 'chef@example.com',
            'status' => 'chef',
        ]);
        //admin user 
        User::factory()->create([
            'email' => 'admin@example.com',
            'status' => 'admin',
        ]);
        $direction = Direction::factory()->create(['chef_id' => $chef->id]);
        $directions = Direction::factory(5)->create();
        $employee = User::factory()->create([
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
        DemandeConge::factory(10)->create();
        User::factory(10)->create(['direction_id' => $directions[rand(0, $directions->count() - 1)]]);
    }
}
