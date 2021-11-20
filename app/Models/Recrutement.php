<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    use HasFactory;

    //champs remplissable pour les utilisateurs
    protected $fillable = [
        'poste',
        'profil',
        'technologies',
        'duree',
        'image_recrutement',
        'user_id'
    ];

    //liaison @ user
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}