<?php

namespace App\Http\Controllers;

use App\Models\categorie_niveaux;
use Illuminate\Http\Request;

class CategorieNiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = categorie_niveaux::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // 1. Validation du champ venant du formulaire
    $request->validate([
        'categories_niveau' => 'required|max:255',
    ]);

    // 2. Création avec correspondance des noms
    \App\Models\categorie_niveaux::create([
        'categories_niveau' => $request->categories_niveau
    ]);

    // 3. Redirection vers l'index avec un message de succès
    return redirect()->route('categories.index')->with('success', 'La catégorie a été ajoutée avec succès !');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $category = categorie_niveaux::findOrFail($id);
    return view('categories.edit', compact('category'));
}

public function update(Request $request, string $id)
{
    $request->validate(['categories_niveau' => 'required']);
    $category = categorie_niveaux::findOrFail($id);
    $category->update($request->all());

    return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour !');
}

public function destroy(string $id)
{
    $category = categorie_niveaux::findOrFail($id);
    $category->delete();

    return redirect()->route('categories.index')->with('success', 'Catégorie supprimée !');
}
}