<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function form(){
        return view('contact.formulaire');
    }

    public function contacter (Request $request) {
        $details=[
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'objet'   => $request->objet,
            'message' => $request->message,
        ];
        //var_dump($details);
	    //$this->validate($request, [ 'message' => 'bail|required' ]);
		/*Mail::to('TsikyAnjaraNomena@gmail.com')->queue(new PostulerEmail($details));
        return view('recrutement.postuler');*/
        Mail::to('balihappy71@gmail.com')->send(new ContactEmail($details));
        return redirect(route('contact.form'))->with('success','Mail envoyé');
	}
}
