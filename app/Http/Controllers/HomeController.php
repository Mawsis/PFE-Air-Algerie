<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {

        if (request('year') && request('month')) {
            $year = request('year');
            $month = request('month');
        } else {
            $year = date('Y');
            $month = date('m');
        }
        $horaire = auth()->user()->horaires()
            ->where('heure_debut', '<=', now())
            ->where('heure_fin', '>=', now())
            ->first();
        $horaires = auth()->user()->horaires()
            ->whereYear('heure_debut', $year)
            ->whereMonth('heure_debut', $month)
            ->whereYear('heure_fin', $year)
            ->whereMonth('heure_fin', $month)
            ->with('absence')
            ->get();
        return Inertia::render('Calendrier', [
            "actualHoraire" => $horaire ?? null,
            "horaires" => $horaires,
            "year" => $year,
            "month" => $month,
        ]);
    }
}
