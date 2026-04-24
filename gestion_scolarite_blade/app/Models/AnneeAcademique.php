<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
    // Nom de la table si elle diffère du pluriel du modèle
    protected $table = 'Annee_Academiques';

    protected $fillable = [
        'code',
        'dateOuverture',
        'dateFermeture',
        'dateDebutInscription',
        'dateFinInscription',
        'statut'
    ];

   // Vérifie si l'année est encore modifiable (Consigne Prof)
    public function estModifiable()
    {
        return $this->statut === 'BROUILLON';
    }
}
