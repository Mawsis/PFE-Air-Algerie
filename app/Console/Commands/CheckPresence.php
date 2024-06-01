<?php

namespace App\Console\Commands;

use App\Models\Absence;
use App\Models\AbsenceNotification;
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
        $horaires = Horaire::where('heure_debut', '<=', now())->where('heure_fin', '>=', now())->with('employee')->get();

        foreach ($horaires as $horaire) {
            $heureDebut = Carbon::parse($horaire->heure_debut);
            $heureFin = Carbon::parse($horaire->heure_fin);
            if (!$horaire->present && $heureDebut->addHour() < now()) {
                if ($horaire->absence_id) {
                    $horaire->absence?->absenceNotification?->delete();
                    $horaire->absence->delete();
                }
                $absence = Absence::create([
                    'user_id' => $horaire->user_id,
                    'valide' => false,
                    'type' => 'retard',
                    'horaire_id' => $horaire->id
                ]);
                $horaire->update([
                    'absence_id' => $absence->id
                ]);
                $this->line("Création d'une absence pour <fg=red>{$absence->employee->nom}</> dans l'horaire de <fg=yellow>" . Carbon::parse($horaire->heure_debut)->format('Y-m-d H:i:s') . "</> à <fg=yellow>" . Carbon::parse($horaire->heure_fin)->format('Y-m-d H:i:s') . "</>");
                if ($heureFin->subHour() < now()) {
                    $absence->type = 'absence';
                    $absence->save();
                }
                AbsenceNotification::create([
                    "absence_id" => $absence->id,
                    "user_id" => $horaire->user_id,
                    "message" => $absence->type === 'absence' ? "{$horaire->employee->nom} est absent le " . Carbon::parse($horaire->heure_debut)->format('Y-m-d H:i:s')
                        : "{$horaire->employee->nom} est en retard le " . Carbon::parse($horaire->heure_debut)->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
