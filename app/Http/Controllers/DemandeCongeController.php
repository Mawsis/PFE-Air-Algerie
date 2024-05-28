<?php

namespace App\Http\Controllers;

use App\Models\DemandeConge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DemandeCongeController extends Controller
{
    public function index()
    {
        return Inertia::render('DemandeConge', [
            'demandes' => auth()->user()->demandesConge()->orderBy('created_at', 'DESC')->get(),
            "soldes" => auth()->user()->soldesConge()->orderBy('created_at', 'DESC')->get()
        ]);
    }
    public function create()
    {
        return Inertia::render('DemanderConge');
    }
    public function store()
    {

        $data = request()->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
            'status' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);

        $currentYear = date('Y');
        $soldeConge = auth()->user()->soldesConge()->whereYear('annee', $currentYear)->first();

        if ($soldeConge && $soldeConge->jours_total > $soldeConge->jours_consommes) {
            return redirect()->back()->withErrors(['error' => 'Insufficient leave balance.']);
        }
        DemandeConge::create($data);
        return Redirect::route('demande-conge');
    }
}
