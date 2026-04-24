<?php

namespace App\Requeste; // Vérifie bien que ton dossier s'appelle "Requeste" et non "Requests"

use Illuminate\Foundation\Http\FormRequest;

class ClasseRequeste extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true; // Obligatoire pour que la requête fonctionne
    }

    /**
     * Définit les règles de validation.
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|unique:classes,nom,' . ($this->classe ?? ''),
            'niveau_id' => 'required|exists:niveaux,id',
            'capacite' => 'required|integer|min:1',
        ];
    }
}
