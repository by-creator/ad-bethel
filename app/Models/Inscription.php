<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        'nom_prenom',
        'telephone',
        'email',
        'nationalite',
        'etat_civil',
        'eglise',
        'date_conversion',
        'motivation',
        'engagement',
    ];

    protected $casts = [
        'date_conversion' => 'date',
    ];
}
