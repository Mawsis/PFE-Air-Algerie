<?php

namespace Database\Seeders;

use App\Models\Absence;
use App\Models\DemandeConge;
use App\Models\Direction;
use App\Models\Horaire;
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
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'status' => 'admin',
        ]);
        Horaire::factory(400)->create(['user_id' => $admin->id]);
        $direction = Direction::factory()->create(['chef_id' => $chef->id]);
        $employee = User::factory()->create([
            'email' => 'user@example.com',
            'status' => 'employee',
            'direction_id' => $direction->id,
        ]);


        $directions = Direction::factory(5)->create();
        $users = User::factory(10)->create(['direction_id' => $direction->id, "status" => "employee"]);
        $horaires = Horaire::factory(100)->create(['user_id' => $users[rand(0, $users->count() - 1)]]);
        for ($i = 0; $i < 20; $i++) {
            $horaire = $horaires[rand(0, $horaires->count() - 1)];
            Absence::factory()->create(["horaire_id" => $horaire->id, "user_id" => $horaire->user_id]);
        }
        foreach ($users as $user) {
            SoldeConge::factory()->create(["user_id" => $user->id, "annee" => 2024]);
        }
        DemandeConge::factory(20)->create(["user_id" => $users[rand(0, $users->count() - 1)]]);
    }
}
