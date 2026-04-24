<?php

namespace App\Requeste;

use Illuminate\Foundation\Http\FormRequest;

class NiveauxRequeste extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'libelle' => 'required|string', // Ex: Licence 1, Master 2
            'filiere_id' => 'required|exists:filieres,id',
        ];
    }
}
