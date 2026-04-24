<?php

namespace App\Service; // <--- Retire le 's' pour correspondre au nom de ton dossier

use App\Models\Classe;

class ClasseService
{
    public function create(array $data)
    {
        return Classe::create($data);
    }
}
