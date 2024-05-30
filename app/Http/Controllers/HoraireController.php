<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HoraireController extends Controller
{
    public function index()
    {
        if (request('input'))
            $employees = User::where('nom', 'like', '%' . request('input') . '%')
                ->orWhere('prenom', 'like', '%' . request('input') . '%')
                ->get();

        $employeeId = (int)request('employee');

        if (request('year') && request('month')) {
            $year = request('year');
            $month = request('month');
        } else {
            $year = date('Y');
            $month = date('m');
        }

        $horaires = User::find($employeeId)->horaires()
            ->whereYear('heure_debut', $year)
            ->whereMonth('heure_debut', $month)
            ->whereYear('heure_fin', $year)
            ->whereMonth('heure_fin', $month)
            ->with('absence')
            ->get();

        return Inertia::render('GererHoraires', [
            'employees' => $employees ?? null,
            'search' => request('input') ?? '',
            'employee' => User::find((int)(request('employee'))) ?? null,
            "horaires" => $horaires ?? null
        ]);
    }
}
