<?php

namespace App\Http\Controllers;

use App\Models\AnneeAcademique;
use App\Service\AnneeAcademiqueService;
use Illuminate\Http\Request;
use Exception; // Importation de la classe Exception

class AnneeAcademiqueController extends Controller
{
    protected $service;

    public function __construct(AnneeAcademiqueService $service)
    {
        $this->service = $service;
    }

public function store(Request $request)
{
    try {
        $this->service->createAnnee($request->all());

        // On utilise l'URL exacte définie à la ligne 25 de ton web.php
        return redirect('/annees')->with('success', 'Année créée !');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', $e->getMessage());
    }
}

    public function index()
{
    // Récupère toutes les données de la table
    $annees = AnneeAcademique::all();

    // Vérifie bien que le nom ici est 'annees'
    return view('annees.index', compact('annees'));
}

    public function create()
    {
        return view('annees.create');
    }
}
