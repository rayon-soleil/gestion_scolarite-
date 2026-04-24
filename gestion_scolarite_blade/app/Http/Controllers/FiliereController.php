<?php

namespace App\Http\Controllers;

use App\Models\filiere;
use App\Models\niveaux; 
use Illuminate\Http\Request;

class FiliereController extends Controller
{
     public function index() {
        $filieres = filiere::all();
        $niveaux = niveaux::all(); 
        
        // On ajoute 'niveaux' dans le compact pour que la vue puisse les lire
        return view('filieres.index', compact('filieres', 'niveaux'));
    }

    public function create() {
        return view('filieres.create');
    }

    public function store(Request $request) {
        $request->validate([
            'code' => 'required',
            'nom_filiere' => 'required'
        ]);
        
        filiere::create($request->all());
        return redirect()->route('filieres.index')->with('success', 'Filière ajoutée !');
    }

    public function edit($id) {
    $filiere = filiere::findOrFail($id);
    return view('filieres.edit', compact('filiere'));
}

public function update(Request $request, $id) {
    $request->validate(['code' => 'required', 'nom_filiere' => 'required']);
    $filiere = filiere::findOrFail($id);
    $filiere->update($request->all());
    return redirect()->route('filieres.index')->with('success', 'Filière mise à jour');
}

public function destroy($id) {
    filiere::findOrFail($id)->delete();
    return redirect()->route('filieres.index')->with('success', 'Filière supprimée');
}
}