<?php

namespace App\Services;

use App\Models\AnneeAcademique;

class AnneeAcademiqueService
{
    public function createAnnee(array $data)
    {
        // On force le statut à BROUILLON par défaut pour toute nouvelle année
        $data['statut'] = 'BROUILLON';

        return AnneeAcademique::create($data);
    }

    public function updateAnnee(AnneeAcademique $annee, array $data)
    {
        // On peut ajouter une règle : on ne modifie pas si l'année est déjà PUBLIE
        if ($annee->statut !== 'BROUILLON') {
            return false;
        }

        return $annee->update($data);
    }
}
