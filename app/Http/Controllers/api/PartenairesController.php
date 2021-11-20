<?php

namespace App\Http\Controllers\api;

use App\Models\Partenaire;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PartenairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires = Partenaire::all();
        return response()->json([
            'partenaires' => $partenaires
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
            'nom' => ['required', 'string', 'max:255'],
            'url' => ['required', 'string', 'max:255'],
            'image_partenaire' => ['required', 'image' ,'mimes: jpg,jpeg,png,svg'],
        ]);
        if($request->hasFile('image_partenaire')){
            $filename = $request->image_partenaire->getClientOriginalName();
            $urlimg = $request->image_partenaire->storeAs('image_partenaire' , $filename , 'public');
            $partenaire = Partenaire::create([
                'nom' => $request['nom'],
                'url' => $request['url'],
                'image_partenaire' => $urlimg,
                'user_id' => Auth::user()->id,
            ]);
        }
        return response()->json([
            'partenaire' => $partenaire,
            'success' => 'Ajout réussi!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        return response()->json([
            'partenaire' => $partenaire
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $partenaire = Partenaire::findOrFail($id);
        if($request->hasFile('image_partenaire')){
            $filename = $request->image_partenaire->getClientOriginalName();
            $logo = $request->image_partenaire->storeAs('image_partenaire' , $filename , 'public');
            $partenaire->nom = $request['nom'];
            $partenaire->url = $request['url'];
            $partenaire->image_partenaire = $logo;
            $partenaire->user_id = Auth::user()->id;
            $partenaire->save();
        }
        else{
            $partenaire->nom = $request['nom'];
            $partenaire->url = $request['url'];
            $partenaire->user_id = Auth::user()->id;
            $partenaire->save();
        }
        return ([
            'message' => 'Le partenaire à été mise à jour'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $partenaire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        $partenaire->delete();
        return ([
            'message' => 'Partenaire effacé',
        ]);
    }
}
