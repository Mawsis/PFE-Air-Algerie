<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HoraireController extends Controller
{
    public function index()
    {
        return Inertia::render('GererHoraires');
    }
}
