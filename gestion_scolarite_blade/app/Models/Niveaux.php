<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class niveaux extends Model
{
    protected $table = 'niveaux';

    // Retour au fillable d'origine sans parent_id
    protected $fillable = ['nom_niveaux', 'categorie_niveau_id'];

    /**
     * Relation avec la catégorie
     */
    public function categorie() {
        return $this->belongsTo(categorie_niveaux::class, 'categorie_niveau_id');
    }

    /**
     * Relation pour récupérer le Niveau Parent (si tu gardes la colonne en BDD)
     */
    public function parent() {
        return $this->belongsTo(niveaux::class, 'parent_id');
    }
}
