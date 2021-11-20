<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;

class ActivitesController extends Controller
{
    public function index(){
        $activites = Activite::all();
        return view('activite.index', [
            'activites' => $activites,
        ]);
    }
    public function show($id){
        $activite = Activite::findOrFail($id);
        return view('activite.show' , compact('activite' ,$activite));
    }
}
