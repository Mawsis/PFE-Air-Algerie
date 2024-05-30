<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmployeeController extends Controller
{
    public function index()
    {
        return Inertia::render('Employees', [
            'employees' => User::with('direction')->get(),
            'directions' => Direction::all()
        ]);
    }
    public function patch(User $employee)
    {

        if (request('status'))
            $employee->status = request('status');
        if (request('direction_id'))
            $employee->direction_id = request('direction_id') === "" ? null : request('direction_id');
        if (request('type'))
            $employee->type = request('type');
        $employee->save();
        return redirect()->route('employees');
    }
}
