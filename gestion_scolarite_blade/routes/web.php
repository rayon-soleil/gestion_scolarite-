<?php

use Illuminate\Support\Facades\Route;
// On importe tous tes contrôleurs pour que Laravel les reconnaisse
use App\Http\Controllers\AnneeAcademiqueController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\CategorieNiveauController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\TarifController;

// Page d'accueil (ton tableau de bord)
Route::get('/', function () {
    return view('welcome');
});

// Les routes "Resource" (elles créent automatiquement l'index, le create, le store, etc.)
Route::resource('filieres', FiliereController::class);
Route::resource('categories', CategorieNiveauController::class);
Route::resource('niveaux', NiveauController::class);
Route::resource('classes', ClasseController::class);
Route::resource('tarifs', TarifController::class);
// --- PARTIE ANNEE ACADEMIQUE (CORRIGÉE) ---
// On n'utilise PAS Route::resource pour éviter l'erreur sur le 'create'
Route::get('/annees', [AnneeAcademiqueController::class, 'index'])->name('annees.index');
Route::get('/annees/create', [AnneeAcademiqueController::class, 'create'])->name('annees.create'); // Règle l'erreur "Route not found"
Route::post('/annees', [AnneeAcademiqueController::class, 'store'])->name('annees.store');
Route::get('/annees/statut/{id}/{nouveauStatut}', [AnneeAcademiqueController::class, 'changerStatut'])->name('annees.statut');
Route::delete('/annees/{id}', [AnneeAcademiqueController::class, 'destroy'])->name('annees.destroy');
Route::put('/annees/{annee}', [AnneeAcademiqueController::class, 'update'])->name('annees.update');
