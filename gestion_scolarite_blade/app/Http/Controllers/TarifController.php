<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\tarifs;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    public function index() {
        $tarifs = tarifs::with('classe')->get();
        return view('tarifs.index', compact('tarifs'));
    }

    public function create() {
        $classes = classe::all();
        return view('tarifs.create', compact('classes'));
    }

    public function store(Request $request) {
        // 1. Validation avec les noms exacts de tes inputs HTML
        $request->validate([
            'classe_id' => 'required|exists:classes,id',
            'montant_inscription' => 'required|numeric',
            'montant_mensualite' => 'required|numeric',
        ]);

        // 2. Insertion simple
        tarifs::create([
            'classe_id' => $request->classe_id,
            'inscription' => $request->montant_inscription,
            'mensualite' => $request->montant_mensualite,
        ]);

        return redirect()->route('tarifs.index')->with('success', 'Tarif enregistré avec succès !');
    }

    public function edit($id) {
        $tarif = tarifs::findOrFail($id);
        $classes = classe::all();
        return view('tarifs.edit', compact('tarif', 'classes'));
    }

    public function update(Request $request, $id) {
        $tarif = tarifs::findOrFail($id);

        // Mise à jour simple sans vérification d'élèves
        $tarif->update([
            'classe_id' => $request->classe_id,
            'inscription' => $request->montant_inscription,
            'mensualite' => $request->montant_mensualite,
        ]);

        return redirect()->route('tarifs.index')->with('success', 'Tarif mis à jour avec succès');
    }

    public function destroy($id) {
        tarifs::findOrFail($id)->delete();
        return redirect()->route('tarifs.index')->with('success', 'Tarif supprimé');
    }
}
