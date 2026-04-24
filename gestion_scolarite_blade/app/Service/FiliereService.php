<?php

namespace App\Services;
use App\Models\Filiere;

class FiliereService
{
    public function getAll() { return Filiere::all(); }
    public function create(array $data) { return Filiere::create($data); }
    public function update(Filiere $filiere, array $data) { return $filiere->update($data); }
    public function delete(Filiere $filiere) { return $filiere->delete(); }
}
