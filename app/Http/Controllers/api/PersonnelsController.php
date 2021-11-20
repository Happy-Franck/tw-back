<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PersonnelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $personnels = Personnel::all();
        return response()->json([
            'personnels' => $personnels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'cin' => ['required', 'integer'],
            'date_de_naissance' => ['required'],
            'adresse' => ['required'],
            'statut' => ['required', 'string', 'max:255'],
            'poste' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'integer'],
            'salaire' => ['required', 'integer'],
            'debut_de_travail' => ['required', 'string', 'max:255'],
            'photo_personnel' => ['required', 'image' ,'mimes: jpg,jpeg,png'],
        ]);
        if($request->hasFile('photo_personnel')){
            $filename = $request->photo_personnel->getClientOriginalName();
            $urlimg = $request->photo_personnel->storeAs('photo_personnel' , $filename , 'public');
            $personnel = Personnel::create([
                'nom' => $request['nom'],
                'prenom' => $request['prenom'],
                'cin' => $request['cin'],
                'date_de_naissance' => $request['date_de_naissance'],
                'adresse' => $request['adresse'],
                'email' => $request['email'],
                'statut' => $request['statut'],
                'poste' => $request['poste'],
                'telephone' => $request['telephone'],
                'salaire' => $request['salaire'],
                'debut_de_travail' => $request['debut_de_travail'],
                'photo_personnel' => $urlimg,
                'user_id' => Auth::user()->id,
            ]);
        }
        return response()->json([
            'personnel' => $personnel,
            'success' => 'Ajout réussi!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $personnel = Personnel::findOrFail($id);
        return response()->json([
            'personnel' => $personnel
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $personnel = Personnel::findOrFail($id);
        if($request->hasFile('photo_personnel')){
            $filename = $request->photo_personnel->getClientOriginalName();
            $urlimg = $request->photo_personnel->storeAs('photo_personnel' , $filename , 'public');
            $personnel->nom = $request['nom'];
            $personnel->prenom = $request['prenom'];
            $personnel->cin = $request['cin'];
            $personnel->date_de_naissance = $request['date_de_naissance'];
            $personnel->adresse = $request['adresse'];
            $personnel->email = $request['email'];
            $personnel->telephone = $request['telephone'];
            $personnel->statut = 'activé';
            $personnel->poste = $request['poste'];
            $personnel->salaire = $request['salaire'];
            $personnel->debut_de_travail = $request['debut_de_travail'];
            $personnel->photo_personnel = $urlimg;
            $personnel->user_id = Auth::user()->id;
            $personnel->save();
        }
        else{
            $personnel->nom = $request['nom'];
            $personnel->prenom = $request['prenom'];
            $personnel->cin = $request['cin'];
            $personnel->date_de_naissance = $request['date_de_naissance'];
            $personnel->adresse = $request['adresse'];
            $personnel->email = $request['email'];
            $personnel->telephone = $request['telephone'];
            $personnel->poste = $request['poste'];
            $personnel->salaire = $request['salaire'];
            $personnel->debut_de_travail = $request['debut_de_travail'];
            $personnel->user_id = Auth::user()->id;
            $personnel->save();
        }
        return ([
            'message' => 'Le personnel à été mise à jour'
        ]);
    }

    public function archiver($id){
        $personnel = Personnel::findOrFail($id);
        $personnel->statut = 'désactivé';
        $personnel->save();
        return ([
            'message' => 'Le personnel archivé'
        ]);
    }

    public function desarchiver($id){
        $personnel = Personnel::findOrFail($id);
        $personnel->statut = 'activé';
        $personnel->save();
        return ([
            'message' => 'Le personnel désarchivé'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $personnel = Personnel::findOrFail($id);
        $personnel->delete();
        return ([
            'message' => 'Personnel effacé',
        ]);
    }
    public function export_badge($id){
        $personnel = Personnel::findOrFail($id);
        $entreprise = User::findOrFail(1);
        view()->share([
            'entreprise' => $entreprise,
            'personnel' => $personnel
        ]);
        $pdf = PDF::setPaper('a7','landscape')->setOptions(['isPhpEnabled' => true, 'isRemoteEnabled' => true, 'isHtml5ParserEnabled' => true])->loadView('api-badge', [$entreprise, $personnel]);
        Storage::put('public/pdf/badge'.$id.'.pdf', $pdf->output());

        return response()->json([
            'pdf' => 'pdf/badge'.$id.'.pdf'
        ]);
    }

    public function export_contrat($id){
        $personnel = Personnel::findOrFail($id);
        $entreprise = User::findOrFail(1);
        view()->share([
            'personnel' => $personnel,
            'entreprise' => $entreprise
        ]);
        $pdf = PDF::loadView('api-contrat-de-travail', [$personnel, $entreprise]);
        Storage::put('public/pdf/contrat-de-travail'.$id.'.pdf', $pdf->output());

        //return $pdf->download('badge.pdf');
        return response()->json([
            'pdf' => 'pdf/contrat-de-travail'.$id.'.pdf'
        ]);
    }

    public function export_attestation_de_stage($id){
        $personnel = Personnel::findOrFail($id);
        $entreprise = User::findOrFail(1);
        view()->share([
            'personnel' => $personnel,
            'entreprise' => $entreprise
        ]);/*
        $pdf = PDF::loadView('api-a-stage', [$personnel, $entreprise]);
        return $pdf->download('Attestation.pdf');
        return ([
            'message' => 'Attestation exporté',
        ]);*/
        $pdf = PDF::loadView('api-a-stage', [$personnel, $entreprise]);
        Storage::put('public/pdf/attestation'.$id.'.pdf', $pdf->output());

        //return $pdf->download('badge.pdf');
        return response()->json([
            'pdf' => 'pdf/attestation'.$id.'.pdf'
        ]);
    }
}
