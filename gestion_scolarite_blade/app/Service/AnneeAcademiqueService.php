<?php

namespace App\Service;

use App\Models\AnneeAcademique;
use Carbon\Carbon;
use Exception;

class AnneeAcademiqueService
{
    public function createAnnee(array $data)
    {
        // 1. Calcul de la durée entre ouverture et fermeture
        $debut = Carbon::parse($data['dateOuverture']);
        $fin = Carbon::parse($data['dateFermeture']);

        // Test : l'année doit faire au moins 9 mois
        if ($debut->diffInMonths($fin) < 9) {
            throw new Exception("Erreur : L'année académique doit durer au moins 9 mois.");
        }

        // 2. On force le statut à BROUILLON par défaut
        $data['statut'] = 'BROUILLON';

        return AnneeAcademique::create($data);
    }

    public function publierAnnee(AnneeAcademique $annee)
    {
        // Test : Si on essaie de publier sans passer par une validation spécifique
        // (Ici on lève l'exception comme demandé dans ton test)
        if ($annee->statut === 'BROUILLON') {
            throw new Exception("Action interdite : Vous ne pouvez pas publier une année en brouillon directement.");
        }

        $annee->statut = 'PUBLIE';
        return $annee->save();
    }
}
