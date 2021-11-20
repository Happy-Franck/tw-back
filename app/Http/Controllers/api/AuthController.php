<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email et/ou mot de passe incorrect'
            ]);
        }
    
        $token = $user->createToken('my-app-token')->plainTextToken;
        //$token = $request->user()->createToken($request->token_name);
    
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
        return response()->json($response, 201);
    }
    function logout(Request $request)
    {
        //effacer tout ces token de l'utilisateur authentifié, se déconnecter de tout les appareils
        /*
        $user = Auth::user();
        $user->tokens()->delete();
        */
        //effacer le token de l'authentification en cours, se déconnecter uniquement sur cette appareil
        $request->user()->currentAccessToken()->delete();
        return "Vous êtes déconnecté, veuillez vous reconnecter";
    }
    public function showprofil(){
        $user = User::findOrFail(1);
        return response()->json([
            'user' => $user,
        ]);
    }
    public function updateprofil(Request $request){
        $user = User::findOrFail(1);
        if($request->hasFile('logo')){
            $filename = $request->logo->getClientOriginalName();
            $logo = $request->logo->storeAs('Logo' , $filename , 'public');
            $user->nom_entreprise = $request['nom_entreprise'];
            $user->adresse_siege_social = $request['adresse_siege_social'];
            $user->gerant = $request['gerant'];
            $user->debut_d_activite = $request['debut_d_activite'];
            $user->telephone = $request['telephone'];
            $user->numero_rcs = $request['numero_rcs'];
            $user->mail_de_contact = $request['mail_de_contact'];
            $user->email = $request['email'];
            if(strlen($request->password) > 0){
                $user->password = Hash::make($request['password']);
            }
            $user->logo = $logo;
            $user->save();
        }
        else{
            $user->nom_entreprise = $request['nom_entreprise'];
            $user->adresse_siege_social = $request['adresse_siege_social'];
            $user->gerant = $request['gerant'];
            $user->debut_d_activite = $request['debut_d_activite'];
            $user->telephone = $request['telephone'];
            $user->numero_rcs = $request['numero_rcs'];
            $user->mail_de_contact = $request['mail_de_contact'];
            $user->email = $request['email'];
            if(strlen($request->password) > 0){
                $user->password = Hash::make($request['password']);
            }
            $user->save();
        }
        return response()->json([
            'user' => $user,
            'message' => "Information de l'entreprise mise à jour"
        ]);
    }
}
