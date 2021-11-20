<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_entreprise',
        'adresse_siege_social',
        'gerant',
        'debut_d_activite',
        'telephone',
        'numero_rcs',
        'mail_de_contact',
        'logo',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Liaison @Recrutements
    public function recrutements(){
        return $this->hasMany('App\Models\Recrutement');
    }
    //Liaison @Activites
    public function activites(){
        return $this->hasMany('App\Models\Activite');
    }
    //Liaison @Partenaires
    public function partenaires(){
        return $this->hasMany('App\Models\Partenaire');
    }
    //Liaison @Categorie_services
    public function categorie_services(){
        return $this->hasMany('App\Models\CategorieService');
    }
    //Liaison @Personnels
    public function personnels(){
        return $this->hasMany('App\Models\Personnel');
    }
}
