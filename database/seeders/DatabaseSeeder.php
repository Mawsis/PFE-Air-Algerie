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

        $finance = User::factory()->create([
            'email' => 'finance@example.com',
            'status' => 'chef',
        ]);
        //admin user 
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'status' => 'admin',
        ]);
        $comptabilite = User::factory()->create([
            'email' => 'comprabilite@example.com',
            'status' => 'chef',
        ]);
        $marketing = User::factory()->create([
            'email' => 'marketing@example.com',
            'status' => 'chef'
        ]);
        $developpement = User::factory()->create([
            'email' => 'devloppement@example.com',
            'status' => 'chef'
        ]);
        $securite = User::factory()->create([
            'email' => 'securite@example.com',
            'status' => 'chef'
        ]);
        $maintenance = User::factory()->create([
            'email' => 'maintenance@example.com',
            'status' => 'chef'
        ]);
        $financeDirection = Direction::factory()->create(['chef_id' => $finance->id, 'nom' => 'Finance']);
        $comptabiliteDirection = Direction::factory()->create(['chef_id' => $comptabilite->id, 'nom' => 'Comptabilite']);
        $marketingDirection = Direction::factory()->create(['chef_id' => $marketing->id, 'nom' => 'Marketing']);
        $developpementDirection = Direction::factory()->create(['chef_id' => $developpement->id, 'nom' => 'Developpement']);
        $securiteDirection = Direction::factory()->create(['chef_id' => $securite->id, 'nom' => 'Securite']);
        $maintenanceDirection = Direction::factory()->create(['chef_id' => $maintenance->id, 'nom' => 'Maintenance']);

        // Horaire::factory(400)->create(['user_id' => $admin->id]);
        // $direction = Direction::factory()->create(['chef_id' => $chef->id]);
        // $employee = User::factory()->create([
        //     'email' => 'user@example.com',
        //     'status' => 'employee',
        //     'direction_id' => $direction->id,
        // ]);


        // $directions = Direction::factory(5)->create();
        // $users = User::factory(10)->create(['direction_id' => $direction->id, "status" => "employee"]);
        // $horaires = Horaire::factory(100)->create(['user_id' => $users[rand(0, $users->count() - 1)]]);
        // for ($i = 0; $i < 20; $i++) {
        //     $horaire = $horaires[rand(0, $horaires->count() - 1)];
        //     Absence::factory()->create(["horaire_id" => $horaire->id, "user_id" => $horaire->user_id]);
        // }
        // foreach ($users as $user) {
        //     SoldeConge::factory()->create(["user_id" => $user->id, "annee" => 2024]);
        // }
        // DemandeConge::factory(20)->create(["user_id" => $users[rand(0, $users->count() - 1)]]);
    }
}
