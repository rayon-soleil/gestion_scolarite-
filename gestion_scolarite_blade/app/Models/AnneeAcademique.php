<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // 1. Importe le trait
use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
    use HasFactory; // 2. Utilise le trait ici

    protected $table = 'Annee_Academiques'; // Vérifie bien le nom de ta table

    protected $fillable = [
        'code',
        'dateOuverture',
        'dateFermeture',
        'dateDebutInscription',
        'dateFinInscription',
        'statut'
    ];
}
