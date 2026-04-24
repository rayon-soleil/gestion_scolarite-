<?php

namespace App\Http\Controllers;

use App\Models\categorie_niveaux;
use App\Models\niveaux;
use Illuminate\Http\Request;

class NiveauController extends Controller
{
    public function index() {
        // On récupère uniquement les niveaux avec leur catégorie
        $niveaux = niveaux::with('categorie')->get();
        return view('niveaux.index', compact('niveaux'));
    }

    public function create() {
        // On ne récupère QUE les catégories
        $categories = categorie_niveaux::all();
        return view('niveaux.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'nom_niveaux' => 'required',
            'categorie_niveau_id' => 'required|exists:categorie_niveaux,id'
        ]);

        niveaux::create($request->all());
        return redirect()->route('niveaux.index')->with('success', 'Niveau créé avec succès !');
    }

    public function edit($id) {
        $niveau = niveaux::findOrFail($id);
        $categories = categorie_niveaux::all();
        return view('niveaux.edit', compact('niveau', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom_niveaux' => 'required',
            'categorie_niveau_id' => 'required|exists:categorie_niveaux,id'
        ]);

        $niveau = niveaux::findOrFail($id);
        $niveau->update($request->all());

        return redirect()->route('niveaux.index')->with('success', 'Niveau mis à jour !');
    }

    public function destroy($id) {
        niveaux::findOrFail($id)->delete();
        return redirect()->route('niveaux.index')->with('success', 'Niveau supprimé !');
    }
}
