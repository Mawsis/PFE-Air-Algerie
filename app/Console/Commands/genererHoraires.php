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
        $users = User::all();

        // Generate horaires for each user
        foreach ($users as $user) {
            switch ($user->type) {
                case "Fixe":
                    $this->generateFixeHoraires($user);
                    break;
                case "Tournant2":
                    $this->generateTournant2Horaires($user);
                    break;
                case "Temporaire":
                    $this->generateTemporaireHoraires($user);
                    break;
            }
            // Create horaires for each day of the next year

        }
    }

    protected function generateFixeHoraires(User $user)
    {
        $date = now()->setTime(8, 0, 0);
        while ($date->year == now()->year) {
            // Check if the current day is not Friday or Saturday
            if ($date->dayOfWeek !== 5 && $date->dayOfWeek !== 6) {
                // Create an horaire from 8:00 to 16:00 for the current day
                Horaire::create([
                    "user_id" => $user->id,
                    "heure_debut" => $date,
                    "heure_fin" => $date->copy()->setTime(16, 0, 0)
                ]);
                $this->line("Creation d'une horaire pour <fg=red>{$user->nom}</> de <fg=green>{$date->format('Y-m-d H:i:s')} a {$date->copy()->setTime(16, 0, 0)->format('Y-m-d H:i:s')}</>");
            }
            $date = $date->addDays(1);
        }
    }
    protected function generateTournant2Horaires(User $user)
    {
        $date = now()->setTime(8, 0, 0);
        $this->info($user->nom);
        while ($date->year == now()->year) {
            $finDate = $date->copy()->addHours(12);
            Horaire::create([
                "user_id" => $user->id,
                "heure_debut" => $date,
                "heure_fin" => $finDate
            ]);
            $this->line("Creation d'une horaire pour <fg=red>{$user->nom}</> de <fg=green>{$date->format('Y-m-d H:i:s')} a {$finDate->format('Y-m-d H:i:s')}</>");
            $date = $finDate;
            $date = $date->addDays(1);
        }
    }

    protected function generateTournant3Horaires(User $user)
    {
        $date = now()->setTime(8, 0, 0);
        $this->info($user->nom);
        while ($date->year == now()->year) {
            $finDate = $date->copy()->addHours(8);
            Horaire::create([
                "user_id" => $user->id,
                "heure_debut" => $date,
                "heure_fin" => $finDate
            ]);
            $this->line("Creation d'une horaire pour <fg=red>{$user->nom}</> de <fg=yellow>{$date->format('Y-m-d H:i:s')} a {$finDate->format('Y-m-d H:i:s')}</>");
            $date = $finDate;
            $date = $date->addDays(1);
        }
    }
}
