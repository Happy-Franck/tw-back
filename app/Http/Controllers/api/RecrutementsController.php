<?php

namespace App\Http\Controllers\api;

use App\Models\Recrutement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RecrutementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recrutements = Recrutement::all();
        return response()->json([
            'recrutement' => $recrutements
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'poste' => ['required', 'string', 'max:255'],
            'profil' => ['required', 'string', 'max:255'],
            'duree' => ['required', 'integer'],
            'technologies' => ['required'],
            'duree' => ['required', 'integer'],
            'image_recrutement' => ['required', 'image' ,'mimes: jpg,jpeg,png,svg'],
        ]);
        if($request->hasFile('image_recrutement')){
            $filename = $request->image_recrutement->getClientOriginalName();
            $logo = $request->image_recrutement->storeAs('image_recrutement' , $filename , 'public');
            $recrutement = Recrutement::create([
                'poste' => $request['poste'],
                'profil' => $request['profil'],
                'duree' => $request['duree'],
                'technologies' => $request['technologies'],
                'image_recrutement' => $logo,
                'user_id' => Auth::user()->id,
            ]);
        }
        return response()->json([
            'recrutement' => $recrutement,
            'message' => "Publication de l'avis de recrutement avec réussi!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recrutement = Recrutement::findOrFail($id);
        return response()->json([
            'recrutement' => $recrutement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recrutement = Recrutement::findOrFail($id);
        if($request->hasFile('image_recrutement')){
            $filename = $request->image_recrutement->getClientOriginalName();
            $logo = $request->image_recrutement->storeAs('image_recrutement' , $filename , 'public');
            $recrutement->poste = $request['poste'];
            $recrutement->profil = $request['profil'];
            $recrutement->duree = $request['duree'];
            $recrutement->technologies = $request['technologies'];
            $recrutement->image_recrutement = $logo;
            $recrutement->user_id = Auth::user()->id;
            $recrutement->save();
        }
        else{
            $recrutement->poste = $request['poste'];
            $recrutement->profil = $request['profil'];
            $recrutement->duree = $request['duree'];
            $recrutement->technologies = $request['technologies'];
            $recrutement->user_id = Auth::user()->id;
            $recrutement->save();
        }
        return ([
            'message' => 'le recrutement à été mise à jour'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recrutement  $recrutement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recrutement = Recrutement::findOrFail($id);
        $recrutement->delete();
        return ([
            'message' => 'Avis de recrutement effacé',
        ]);
    }
}
