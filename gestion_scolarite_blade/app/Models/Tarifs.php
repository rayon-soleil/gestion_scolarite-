<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarifs extends Model
{
    protected $table = 'tarifs';

    protected $fillable = [
        'filiere_id',
        'niveau_id',
        'annee_academique_id',
        'montant',
    ];

    public function classe() {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}   
