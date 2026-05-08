<?php

namespace App\Service; 

use App\Models\Tarifs;

class TarifService
{
    public function create(array $data)
    {
        // On appelle bien le modèle Tarifs (avec un 's')
        return Tarifs::updateOrCreate(
            [
                'filiere_id' => $data['filiere_id'],
                'niveau_id' => $data['niveau_id'],
                'annee_academique_id' => $data['annee_academique_id']
            ],
            ['montant' => $data['montant']]
        );
    }
}
