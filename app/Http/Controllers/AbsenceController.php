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
        $direction =  auth()->user()->directionManage;
        $chef = Chef::find(auth()->user()->id);
        $absences = collect(); // Initialize an empty collection
        foreach ($chef->employees as $employee) {
            $absences = $absences->merge($employee->absences()->with('employee')->with('horaire')->get());
        }
        return Inertia::render('Absences', [
            'absences' => $absences,
            'direction' => $direction
        ]);
    }

    public function show(User $employee)
    {
        //check if employee is in the direction of the chef
        $chef = Chef::find(auth()->user()->id);
        if (!$chef->employees->contains($employee)) {
            return redirect()->route('absences');
        }
        $absences = $employee->absences()->with('employee')->with('horaire')->get();
        return Inertia::render('Absences', [
            'absences' => $absences,
            'employee' => $employee,
            'direction' => auth()->user()->directionManage
        ]);
    }
}
