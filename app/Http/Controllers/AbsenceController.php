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
        $absences = [];
        foreach ($chef->employees as $employee) {
            $absences[] = $employee->absences()->with('employee')->with('horaire')->get();
        }
        return Inertia::render('Absences', [
            'absences' => $absences,
            'direction' => $direction
        ]);
    }
}
