<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DemandeInscriptionController extends Controller
{
    public function index()
    {
        return Inertia::render('DemandesInscription', [
            'demandes' => User::where('status', null)->with("direction")->get()
        ]);
    }
    public function patch(User $employee, string $status)
    {
        $employee->status = $status;
        $employee->save();
        return redirect()->route('demandes-inscription');
    }
}
