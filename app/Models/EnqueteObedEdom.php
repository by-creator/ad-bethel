<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnqueteObedEdom extends Model
{
    protected $table = 'enquete_obed_edom';

    protected $fillable = [
        'nom_prenom',
        'telephone',
        'propositions',
        'appreciations',
        'dispo_presentiel',
        'commentaire_presentiel',
        'sujets_defis',
        'dispo_3e_culte',
        'incitation_3e_culte',
        'est_entrepreneur',
        'activite',
        'lieu_sortie',
    ];
}
