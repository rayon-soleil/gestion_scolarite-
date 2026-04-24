<?php

namespace App\Requeste;

use Illuminate\Foundation\Http\FormRequest;

class TarifsRequeste extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'montant' => 'required|numeric|min:0',
            'filiere_id' => 'required|exists:filieres,id',
            'niveau_id' => 'required|exists:niveaux,id',
            'annee_academique_id' => 'required|exists:annees,id',
        ];
    }
}
