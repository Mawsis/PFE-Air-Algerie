<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AbsenceController extends Controller
{
    public function index(User $employee)
    {
        return Inertia::render('Absence', [
            'absences' => $employee->absences()->orderBy('created_at', 'DESC')->get(),
        ]);
    }
}
