<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieService extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_categorie_service',
        'type_service',
        'user_id',
    ];
    //liaison @ user
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    //Liaison @Categorie_services
    public function services(){
        return $this->hasMany('App\Models\Service');
    }
    //Liaison @Categorie_services
    public function technologies(){
        return $this->hasMany('App\Models\Technologie');
    }
}