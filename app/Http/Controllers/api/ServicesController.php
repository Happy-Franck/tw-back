<?php

namespace App\Http\Controllers\api;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::All();
        return response()->json([
            'services' => $services
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
            'description' => ['required'],
            'image_service' => ['required', 'image' ,'mimes: jpg,jpeg,png,ico,svg,webp'],
        ]);
        if($request->hasFile('image_service')){
            $filename = $request->image_service->getClientOriginalName();
            $urlimg = $request->image_service->storeAs('image_service' , $filename , 'public');
            $service = Service::create([
                'nom' => $request['nom'],
                'description' => $request['description'],
                'image_service' => $urlimg,
                'categorie_services_id' => $request['categorie_services_id'],
            ]);
        }
        return response()->json([
            'service' => $service,
            'success' => 'Ajout réussi!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return response()->json([
            'service' => $service
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
        $service = Service::findOrFail($id);
        if($request->hasFile('image_service')){
            $filename = $request->image_service->getClientOriginalName();
            $logo = $request->image_service->storeAs('image_service' , $filename , 'public');
            $service->nom = $request['nom'];
            $service->description = $request['description'];
            $service->image_service = $logo;
            $service->categorie_services_id = $request['categorie_services_id'];
            $service->save();
        }
        else{
            $service->nom = $request['nom'];
            $service->description = $request['description'];
            $service->categorie_services_id = $request['categorie_services_id'];
            $service->save();
        }
        return ([
            'message' => 'Notre service à été mise à jour'
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
        $service = Service::findOrFail($id);
        $service->delete();
        return ([
            'message' => 'Service effacé',
        ]);
    }
}
