<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\DemandeConge;
use App\Models\DemandeCongeNotification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Spatie\LaravelPdf\Facades\Pdf;

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
                $demandes = $demandes->merge($employee->demandesConge()->where("status", "!=", "approuvée")->where("status", "!=", "approuvéeChef")->with('employee')->get());
            }
        } elseif (auth()->user()->status === 'admin') {
            foreach (User::where('status', 'employee')->get() as $employee) {
                $demandes = $demandes->merge($employee->demandesConge()->where("status", "approuvéeChef")->with('employee')->get())->unique("id");
            }
        }
        return Inertia::render('DemandeCongeChef', [
            'demandes' => $demandes,
        ]);
    }
    public function patch(DemandeConge $demande, string $status)
    {
        if (auth()->user()->status === 'chef') {
            $demande->chef_id = auth()->user()->id;
        }
        if (auth()->user()->status === 'admin') {
            $demande->admin_id = auth()->user()->id;
        }
        if ($status === 'approuvée') {
            $solde = $demande->employee->soldesConge()->where('annee', date('Y'))->first();
            $solde->update([
                'jours_consommes' => $demande->status !== "approuvée"
                    ? $solde->jours_consommes + Carbon::parse($demande->date_debut)->diffInDays(Carbon::parse($demande->date_fin))
                    : $solde->jours_consommes
            ]);
            DemandeCongeNotification::create([
                "user_id" => $demande->employee->id,
                "demande_conge_id" => $demande->id,
                "message" => "Votre demande de congé a été approuvée"
            ]);
        } elseif ($status == "refuse") {
            $solde = $demande->employee->soldesConge()->where('annee', date('Y'))->first();
            $solde->update([
                'jours_consommes' => $demande->status === "approuvée"
                    ? $solde->jours_consommes - Carbon::parse($demande->date_debut)->diffInDays(Carbon::parse($demande->date_fin))
                    : $solde->jours_consommes
            ]);
            DemandeCongeNotification::create([
                "user_id" => $demande->employee->id,
                "demande_conge_id" => $demande->id,
                "message" => "Votre demande de congé a été refusée"
            ]);
        } elseif ($status == "en attente") {
            $solde = $demande->employee->soldesConge()->where('annee', date('Y'))->first();
            $solde->update([
                'jours_consommes' => $demande->status === "approuvée"
                    ? $solde->jours_consommes - Carbon::parse($demande->date_debut)->diffInDays(Carbon::parse($demande->date_fin))
                    : $solde->jours_consommes
            ]);
        }
        $demande->status = $status;
        $demande->save();

        return redirect()->route('demande-conge-chef');
    }

    public function pdf(DemandeConge $demande)
    {
        return Pdf::view('demandeConge', [
            "demande" => DemandeConge::where("id", $demande->id)->with("chef")->with("admin")->first(),
            "employee" => User::where("id", $demande->user_id)->with("direction")->first()
        ])->format('a4')->name('demandeConge.pdf');
    }
}
