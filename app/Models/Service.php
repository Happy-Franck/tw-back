<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    //champs remplissable pour les utilisateurs
    protected $fillable = [
        'nom',
        'description',
        'image_service',
        'categorie_services_id',
    ];

    //liaison @ user
    public function categorie_service(){
    	return $this->belongsTo('App\Models\CategorieService');
    }
}
