<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DemandeInscriptionController extends Controller
{
    public function index()
    {
        return Inertia::render('DemandeInscription');
    }
}
