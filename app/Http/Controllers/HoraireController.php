<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use App\Models\User;
use Carbon\Carbon;
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

        $employeeId = (int)request('employee') ?? null;

        if (request('year') && request('month')) {
            $year = request('year');
            $month = request('month');
        } else {
            $year = date('Y');
            $month = date('m');
        }
        if ($employeeId)
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
            "horaires" => $horaires ?? null,
            "year" => $year,
            "month" => $month,
        ]);
    }
    public function delete($horaireId)
    {
        $horaire = Horaire::find($horaireId);
        $horaire->delete();
        return redirect()->back();
    }
    public function update($horaireId)
    {
        $horaire = Horaire::find($horaireId);
        $horaire->update(request()->all());
        return redirect()->back();
    }
    public function store()
    {
        Horaire::create([
            'user_id' => request('user_id'),
            'heure_debut' => Carbon::parse(request('heure_debut')),
            'heure_fin' => Carbon::parse(request('heure_fin')),
        ]);
        return redirect()->back();
    }
}
