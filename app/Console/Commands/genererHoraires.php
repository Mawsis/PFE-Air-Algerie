<?php

namespace App\Console\Commands;

use App\Models\Horaire;
use App\Models\User;
use Illuminate\Console\Command;

class genererHoraires extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generer-horaires';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get all users of type "Fixe"
        $users = User::where('type', 'Fixe')->get();

        // Generate horaires for each user
        foreach ($users as $user) {
            // Create horaires for each day of the next year
            for ($day = 1; $day <= 3; $day++) {
                // Get the date for the current day
                $date = now()->setTime(8, 0, 0)->addDays($day);

                // Check if the current day is not Friday or Saturday
                if ($date->dayOfWeek !== 5 && $date->dayOfWeek !== 6) {
                    // Create an horaire from 8:00 to 18:00 for the current day
                    Horaire::create([
                        "user_id" => $user->id,
                        "heure_debut" => $date,
                        "heure_fin" => $date
                    ]);
                }
            }
        }
    }
}
