<?php

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\DemandeCongeController;
use App\Http\Controllers\DemandeInscriptionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get("/pdf", [AbsenceController::class, 'pdf'])->name('pdf');

Route::middleware('auth')->group(function () {
    Route::get('/wait', function () {
        return Inertia::render('AttenteAdmin');
    })->name('wait');
    Route::middleware('isEmployee')->group(function () {
        Route::get('/', function () {
            return Inertia::render('Calendrier',);
        })->name('/');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/demande_conge', [DemandeCongeController::class, 'index'])->name('demande-conge');
        Route::get('/demander_conge', [DemandeCongeController::class, 'create'])->name('demander-conge.create');
        Route::post('/demander_conge', [DemandeCongeController::class, 'store'])->name('demander-conge.store');

        Route::middleware('isChef')->group(function () {
            Route::get('/demande_conge_chef', [DemandeCongeController::class, 'indexChef'])->name('demande-conge-chef');
            Route::patch('/demande_conge_chef/{demande}/{status}', [DemandeCongeController::class, 'patch'])->name('demande-conge-chef.patch');

            Route::get('/absences', [AbsenceController::class, 'index'])->name('absences');
            Route::get('/absences/{employee}', [AbsenceController::class, 'show'])->name('absences.employee');
            Route::get('/absences/{employee}/rapport', [AbsenceController::class, 'rapport'])->name('absences.rapport');
            Route::patch('/absences/{absence}', [AbsenceController::class, 'patch'])->name('absences.patch');

            Route::get('/horaires', [HoraireController::class, 'index'])->name('horaires');
        });
        Route::middleware('isAdmin')->group(function () {
            Route::get('/demandes_inscription', [DemandeInscriptionController::class, 'index'])->name('demandes-inscription');
            Route::patch('/demandes_inscription/{employee}/{status}', [DemandeInscriptionController::class, 'patch'])->name('demandes-inscription.patch');

            Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
            Route::patch('/employees/{employee}', [EmployeeController::class, 'patch'])->name('employees.patch');
        });
    });
});
Route::get("/404", function () {
    return Inertia::render('NotFound');
})->name('NotFound');


require __DIR__ . '/auth.php';
