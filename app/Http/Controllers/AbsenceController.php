<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AbsenceController extends Controller
{
    public function index(User $employee)
    {
        $absences = collect(); // Initialize an empty collection
        if (auth()->user()->status === 'chef') {
            $direction =  auth()->user()->directionManage;
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
}
