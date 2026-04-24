<?php

namespace App\Http\Controllers;

// On importe EXACTEMENT ce que tu as mis dans ton namespace
use App\Requeste\ClasseRequeste;
use App\Service\ClasseService;
use App\Models\Classe;
use App\Models\Niveau;
use App\Requeste\NiveauxRequeste;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    protected $service;

    public function __construct(ClasseService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        // On récupère les classes avec leurs niveaux pour l'affichage
        $classes = Classe::with('niveau')->get();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        // Nécessaire pour remplir le <select> dans ton formulaire
        $niveaux = NiveauxRequeste::all();
        return view('classes.create', compact('niveaux'));
    }

    public function store(ClasseRequeste $request)
    {
        // Ici, $request contient déjà les données validées par ton fichier ClasseRequeste
        $this->service->create($request->validated());

        return redirect()->route('classes.index')->with('success', 'Classe ajoutée avec succès !');
    }
}
