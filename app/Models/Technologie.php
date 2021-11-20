<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model
{
    use HasFactory;
    //champs remplissable pour les utilisateurs
    protected $fillable = [
        'nom',
        'image_technologie',
        'categorie_services_id',
    ];

    //liaison @ user
    public function categorie_service(){
    	return $this->belongsTo('App\Models\CategorieService');
    }
}
