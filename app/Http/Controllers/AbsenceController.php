<?php

namespace App\Http\Controllers;

use App\Models\Absence;
use App\Models\Chef;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\LaravelPdf\Facades\Pdf;

class AbsenceController extends Controller
{
    public function index(User $employee)
    {
        $absences = collect(); // Initialize an empty collection
        if (auth()->user()->status === 'chef') {
            $direction =  auth()->user()->directionManage->nom;
            $chef = Chef::find(auth()->user()->id);
            foreach ($chef->employees as $employee) {
                $absences = $absences->merge($employee->absences()->with('employee')->with('horaire')->get());
            }
        } elseif (auth()->user()->status === 'admin') {
            foreach (User::where('status', 'employee')->get() as $employee) {
                $absences = $absences->merge($employee->absences()->with('employee')->with('horaire')->get());
            }
            $direction = "Toute";
        }
        return Inertia::render('Absences', [
            'absences' => $absences,
            'direction' => $direction
        ]);
    }

    public function show(User $employee)
    {
        $absences = collect(); // Initialize an empty collection
        if (auth()->user()->status === 'chef') {
            $chef = Chef::find(auth()->user()->id);
            if (!$chef->employees->contains($employee)) {
                return redirect()->route('absences');
            }
            $absences = $employee->absences()->with('employee')->with('horaire')->get();
        } elseif (auth()->user()->status === 'admin') {
            $absences = $employee->absences()->with('employee')->with('horaire')->get();
        }
        return Inertia::render('Absences', [
            'absences' => $absences,
            'employee' => $employee,
        ]);
    }
    public function patch(Absence $absence)
    {
        $absence->valide = !$absence->valide;
        $absence->save();
        return redirect()->back();
    }

    public function rapport(User $employee, string $format, string $date)
    {
        if ($format === "year") {
            $absences = $employee->absences()->whereHas('horaire', function ($query) use ($date) {
                $query->whereYear('heure_debut', $date);
            })->with("horaire")->get();
        } else {
            $absences = $employee->absences()->whereHas('horaire', function ($query) use ($date) {
                $query->whereMonth('heure_debut', $date);
            })->with("horaire")->get();
        }
        return Pdf::view('pdf', [
            "absences" => $absences,
            "employee" => User::where("id", $employee->id)->with("direction")->first(),
        ])->format('a4')->name('invoice.pdf');
    }
}
