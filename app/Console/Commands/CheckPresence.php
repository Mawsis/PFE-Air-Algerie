<?php

namespace App\Console\Commands;

use App\Models\Absence;
use App\Models\Horaire;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckPresence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-presence';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the presence of employees in the company.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking presence of employees...');
        $horaires = Horaire::where('heure_debut', '<=', now())->where('heure_fin', '>=', now())->get();

        foreach ($horaires as $horaire) {
            $heureDebut = Carbon::parse($horaire->heure_debut);
            $heureFin = Carbon::parse($horaire->heure_fin);
            if (!$horaire->present && $heureDebut->addHour() < now()) {
                $absence = Absence::create([
                    'user_id' => $horaire->user_id,
                    'valide' => false,
                    'type' => 'retard',
                    'horaire_id' => $horaire->id
                ]);
                $this->info("creating retard for {$horaire->id}");
                if ($heureFin->subHour() < now()) {
                    $absence->type = 'absence';
                    $absence->save();
                }
            }
        }
    }
}
