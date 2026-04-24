<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classe extends Model
{
    protected $fillable = [ 'nom_classe',  'code_classe',  'filiere_id','niveau_id'];
   
    public function filiere()
{
    return $this->belongsTo(Filiere::class);
}

public function niveau()
{
    return $this->belongsTo(niveaux::class);
}
}
