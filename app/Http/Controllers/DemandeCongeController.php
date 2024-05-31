<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\DemandeConge;
use App\Models\User;
use Carbon\Carbon;
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
        $soldeConge = auth()->user()->soldesConge()->where('annee', date('Y'))->first();
        error_log(
            (int)(Carbon::parse($data["date_debut"])->diffInDays(Carbon::parse($data["date_fin"]))) > $soldeConge->restant() ? "yolo" : "hola"
        );
        if (Carbon::parse($data["date_debut"])->diffInDays(Carbon::parse($data["date_fin"])) > $soldeConge->restant()) {
            return redirect()->back()->withErrors(['date_debut' => "Pas assez de solde de conge"]);
        }
        if (
            $soldeConge && $soldeConge->jours_total <= $soldeConge->jours_consommes
        ) {
            return redirect()->back()->withErrors(['error' => 'Insufficient leave balance.']);
        }
        DemandeConge::create($data);
        return Redirect::route('demande-conge');
    }
    public function indexChef()
    {
        $demandes = collect();
        //get all demandesConge from chef's employees
        if (auth()->user()->status === 'chef') {
            $chef = Chef::find(auth()->user()->id);
            foreach ($chef->employees as $employee) {
                $demandes = $demandes->merge($employee->demandesConge()->with('employee')->get());
            }
        } elseif (auth()->user()->status === 'admin') {
            foreach (User::where('status', 'employee')->get() as $employee) {
                $demandes = $demandes->merge($employee->demandesConge()->with('employee')->get());
            }
        }

        return Inertia::render('DemandeCongeChef', [
            'demandes' => $demandes,
        ]);
    }
    public function patch(DemandeConge $demande, string $status)
    {
        $demande->status = $status;
        if ($status === 'approuvée') {
            $solde = $demande->employee->soldesConge()->where('annee', date('Y'))->first();
            $solde->update([
                'jours_consommes' => $solde->jours_consommes + Carbon::parse($demande->date_debut)->diffInDays(Carbon::parse($demande->date_fin))
            ]);
        } elseif ($status == "refuse") {
            $solde = $demande->employee->soldesConge()->where('annee', date('Y'))->first();
            $solde->update([
                'jours_consommes' => $solde->jours_consommes - Carbon::parse($demande->date_debut)->diffInDays(Carbon::parse($demande->date_fin))
            ]);
        }
        $demande->save();

        return redirect()->route('demande-conge-chef');
    }
}
