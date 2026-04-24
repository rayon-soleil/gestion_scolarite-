<?php

namespace App\Service;

use App\Models\Tarif; // Vérifie que ton Model Tarif existe bien ici

class TarifService
{
    public function create(array $data)
    {
        // On remplace TarifService:: par Tarif::
        return TarifService::updateOrCreate(
            [
                'filiere_id' => $data['filiere_id'],
                'niveau_id' => $data['niveau_id'],
                'annee_academique_id' => $data['annee_academique_id']
            ],
            ['montant' => $data['montant']]
        );
    }
}
