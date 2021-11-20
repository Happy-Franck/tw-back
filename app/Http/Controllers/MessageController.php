<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importation des classes pour le mail

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;

class MessageController extends Controller
{
	// Le formulaire du message
	public function formMessageGoogle () {
		return view("forms.message-google");
	}

    // Envoi du mail aux utilisateurs
	public function sendMessageGoogle (Request $request) {

		#1. Validation de la requête
		$this->validate($request, [ 'message' => 'bail|required' ]);

		#2. Récupération des utilisateurs
	    //	$users = User::all();

		#3. Envoi du mail
        //->bcc("TsikyAnjaraNomena@gmail.com")
		Mail::to('TsikyAnjaraNomena@gmail.com')->queue(new MessageGoogle($request->all()));

		return back()->withText("Message envoyé");
	}

}
