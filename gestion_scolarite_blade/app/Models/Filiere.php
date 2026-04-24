<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
   protected $fillable = ['code', 'nom_filiere'];

    public function classes() {
        return $this->hasMany(Classe::class);
    }
}
