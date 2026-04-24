<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnneeAcademiqueRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Autorise l'accès à cette requête
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|unique:annees,code,' . ($this->annee ?? ''),
            'dateOuverture' => 'required|date',
            'dateFermeture' => 'required|date|after:dateOuverture',
            'dateDebutInscription' => 'required|date',
            // La règle que nous avons traduite précédemment
            'dateFinInscription' => 'required|date|after:dateDebutInscription',
        ];
    }

    public function messages(): array
    {
        return [
            'dateFinInscription.after' => "La date de fin d'inscription doit être après la date de début.",
            'dateFermeture.after' => "La date de fermeture doit être après la date d'ouverture.",
        ];
    }
}
