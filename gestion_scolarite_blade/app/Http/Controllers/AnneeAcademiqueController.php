<?php
namespace App\Http\Controllers;

use App\Http\Requests\AnneeAcademiqueRequest;
use App\Services\AnneeAcademiqueService;
use App\Models\AnneeAcademique;

class AnneeAcademiqueController extends Controller
{
    protected $anneeService;

    public function __construct(AnneeAcademiqueService $service)
    {
        $this->anneeService = $service;
    }

    public function store(AnneeAcademiqueRequest $request)
    {
        // On utilise les données déjà validées par la Request
        $this->anneeService->createAnnee($request->validated());

        return redirect()->route('annees.index')->with('success', 'Année créée avec succès !');
    }
}
