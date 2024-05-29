<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\DemandeCongeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return Inertia::render('Dashboard',);
})->middleware('auth');

Route::get('/about', function () {
    return Inertia::render('AttenteAdmin');
})->middleware('auth')->middleware('isChef');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->middleware('auth');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/demande_conge', [DemandeCongeController::class, 'index'])->name('demande-conge');
    Route::get('/demander_conge', [DemandeCongeController::class, 'create'])->name('demander-conge.create');
    Route::post('/demander_conge', [DemandeCongeController::class, 'store'])->name('demander-conge.store');
});

Route::middleware('auth')->middleware('isChef')->group(function () {
    Route::get('/demande_conge_chef', [DemandeCongeController::class, 'indexChef'])->name('demande-conge-chef');
    Route::patch('/demande_conge_chef/{demande}', [DemandeCongeController::class, 'update'])->name('demande-conge-chef.update');

    Route::get('/absences', [AbsenceController::class, 'index'])->name('absences');
    Route::get('/absences/{employee}', [AbsenceController::class, 'show'])->name('absences.employee');
    Route::get('/absences/{employee}/rapport', [AbsenceController::class, 'rapport'])->name('absences.rapport');
});

require __DIR__ . '/auth.php';
