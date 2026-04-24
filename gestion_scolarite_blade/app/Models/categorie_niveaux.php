<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie_niveaux extends Model
{
    protected $table = 'categorie_niveaux'; 
    protected $fillable = ['categories_niveau'];

    public function niveaux() {
        return $this->hasMany(niveaux::class);
    }
}
