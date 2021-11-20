<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;

    //champs remplissable pour les utilisateurs
    protected $fillable = [
        'nom',
        'prenom',
        'cin',
        'date_de_naissance',
        'adresse',
        'email',
        'telephone',
        'salaire',
        'debut_de_travail',
        'photo_personnel',
        'poste',
        'statut',
        'user_id'
    ];

    //liaison @ user
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
