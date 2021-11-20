<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_activite',
        'titre',
        'description',
        'lieu',
        'date',
        'user_id'
    ];
    //liaison @ user
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}