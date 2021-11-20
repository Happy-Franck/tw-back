<?php

namespace App\Http\Controllers;

use App\Models\Partenaire;

class PartenairesController extends Controller
{
    public function index(){
        $partenaires = Partenaire::all();
        return view('partenaires.index', [
            'partenaires' => $partenaires,
        ]);
    }
    public function show($id){
        $partenaire = Partenaire::findOrFail($id);
        return view('partenaires.show' , compact('partenaire' ,$partenaire));
    }
}
