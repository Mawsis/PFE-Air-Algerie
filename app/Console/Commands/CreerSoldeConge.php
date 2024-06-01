<?php

namespace App\Console\Commands;

use App\Models\SoldeConge;
use App\Models\User;
use Illuminate\Console\Command;

class CreerSoldeConge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:creer-solde-conge';

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
        // Get all employees
        $employees = User::all();

        // Create a new soldeConge for each employee
        foreach ($employees as $employee) {
            SoldeConge::create([
                "annee" => date('Y'),
                "jours_total" => 30,
                "jours_consommes" => 0,
                "user_id" => $employee->id
            ]);
        }
    }
}
