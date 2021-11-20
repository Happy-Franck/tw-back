<?php

namespace App\Http\Controllers;

use App\Models\Recrutement;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Mail;
use App\Mail\PostulerEmail;

class RecrutementsController extends Controller
{
    public function index(){
        $recrutements = Recrutement::all();
        return view('recrutement.index', [
            'recrutements' => $recrutements,
        ]);
    }
    public function show($id){
        $recrutement = Recrutement::findOrFail($id);
        return view('recrutement.show' , compact('recrutement' ,$recrutement));
    }

    public function postuler (Request $request) {
        $recrutement = Recrutement::findOrFail($request->id);

        $urlCv = $request->cv->storeAs('cv' , $request->cv->getClientOriginalName() , 'public');
        $urlLm = $request->lm->storeAs('lm' , $request->lm->getClientOriginalName() , 'public');

        $details=[
            'poste' => $recrutement->poste,
            'profil' => $recrutement->profil,
            'duree' => $recrutement->duree,
            'technologies' => $recrutement->technologies,
            'cv' => str_replace('\\', '/', public_path().'/storage/'.$urlCv),
            'lm' => str_replace('\\', '/', public_path().'/storage/'.$urlLm),
            'email'   => $request->email,
            'message' => $request->message,
        ];
        //var_dump($details);
	    //$this->validate($request, [ 'message' => 'bail|required' ]);
		/*Mail::to('TsikyAnjaraNomena@gmail.com')->queue(new PostulerEmail($details));
        return view('recrutement.postuler');*/
        Mail::to('balihappy71@gmail.com')->send(new PostulerEmail($details));
        return redirect(route('recrutement.index'))->with('okok','Candidature envoyée');
	}

}
