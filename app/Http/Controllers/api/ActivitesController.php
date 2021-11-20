<?php

namespace App\Http\Controllers\api;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ActivitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = Activite::all();
        return response()->json([
            'activites' => $activites,
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
            'image_activite' => ['required', 'image' ,'mimes: jpg,jpeg,png,svg'],
            'titre' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'lieu' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
        ]);
        if($request->hasFile('image_activite')){
            $filename = $request->image_activite->getClientOriginalName();
            $urlimg = $request->image_activite->storeAs('image_activite' , $filename , 'public');
            $activite = activite::create([
                'image_activite' => $urlimg,
                'titre' => $request['titre'],
                'description' => $request['description'],
                'lieu' => $request['lieu'],
                'date' => $request['date'],
                'user_id' => Auth::user()->id,
            ]);
        }
        else{

        }
        return response()->json([
            'activite' => $activite,
            'success' => 'Ajout réussi!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $activite = Activite::findOrFail($id);
        return response()->json([
            'activite' => $activite
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $activite = Activite::findOrFail($id);
        if($request->hasFile('image_activite')){
            $filename = $request->image_activite->getClientOriginalName();
            $logo = $request->image_activite->storeAs('image_activite' , $filename , 'public');
            $activite->image_activite = $logo;
            $activite->titre = $request['titre'];
            $activite->description = $request['description'];
            $activite->lieu = $request['lieu'];
            $activite->date = $request['date'];
            $activite->user_id = Auth::user()->id;
            $activite->save();
        }
        else{
            $activite->titre = $request['titre'];
            $activite->description = $request['description'];
            $activite->lieu = $request['lieu'];
            $activite->date = $request['date'];
            $activite->user_id = Auth::user()->id;
            $activite->save();
        }
        return ([
            'message' => "L'activité à été mise à jour"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activite  $activite
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activite = Activite::findOrFail($id);
        $activite->delete();
        return ([
            'message' => "L'activité effacé",
        ]);
    }
}
