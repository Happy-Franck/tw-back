<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_partenaire',
        'nom',
        'url',
        'user_id'
    ];
    //liaison @ user
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
