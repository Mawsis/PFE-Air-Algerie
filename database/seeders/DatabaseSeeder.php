<?php

namespace Database\Seeders;

use App\Models\Direction;
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
        User::factory()->create([
            'nom' => 'user',
            'email' => 'user@example.com',
            'status' => 'employee',
            'direction_id' => $direction->id,
        ]);
    }
}
