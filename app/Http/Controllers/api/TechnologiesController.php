<?php

namespace App\Http\Controllers\api;

use App\Models\Technologie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnologiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technologie::All();
        return response()->json([
            'technologies' => $technologies
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
            'image_technologie' => ['required', 'image' ,'mimes: jpg,jpeg,png,svg'],
        ]);
        if($request->hasFile('image_technologie')){
            $filename = $request->image_technologie->getClientOriginalName();
            $urlimg = $request->image_technologie->storeAs('image_technologie' , $filename , 'public');
            $technologie = Technologie::create([
                'nom' => $request['nom'],
                'image_technologie' => $urlimg,
                'categorie_services_id' => $request['categorie_services_id'],
            ]);
        }
        return response()->json([
            'technologie' => $technologie,
            'success' => 'Ajout réussi!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technologie  $technologie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technologie = Technologie::findOrFail($id);
        return response()->json([
            'technologie' => $technologie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $technologie = Technologie::findOrFail($id);
        if($request->hasFile('image_technologie')){
            $filename = $request->image_technologie->getClientOriginalName();
            $logo = $request->image_technologie->storeAs('image_technologie' , $filename , 'public');
            $technologie->nom = $request['nom'];
            $technologie->image_technologie = $logo;
            $technologie->categorie_services_id = $request['categorie_services_id'];
            $technologie->save();
        }
        else{
            $technologie->nom = $request['nom'];
            $technologie->categorie_services_id = $request['categorie_services_id'];
            $technologie->save();
        }
        return ([
            'message' => 'Notre technologie à été mise à jour'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $technologie = Technologie::findOrFail($id);
        $technologie->delete();
        return ([
            'message' => 'Technologie effacé',
        ]);
    }
}
