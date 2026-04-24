<?php
namespace App\Requeste;

use Illuminate\Foundation\Http\FormRequest;

class FiliereRequeste extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'libelle' => 'required|string|max:255|unique:filieres,libelle,' . ($this->filiere ?? ''),
            'description' => 'nullable|string',
        ];
    }
}
