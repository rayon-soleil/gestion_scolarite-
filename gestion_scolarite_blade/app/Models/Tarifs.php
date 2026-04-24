<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tarifs extends Model
{
    protected $table = 'tarifs';

    protected $fillable = [
        'classe_id',
        'inscription',
        'mensualite',

    ];

    public function classe() {
        return $this->belongsTo(classe::class, 'classe_id');
    }
}   
