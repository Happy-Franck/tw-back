<?php

namespace App\Http\Controllers\api;

use App\Models\Service;
use App\Models\Technologie;
use Illuminate\Http\Request;
use App\Models\CategorieService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategorieServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorie_services = CategorieService::All();
        return response()->json([
            'categorie_services' => $categorie_services
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
            'type_service' => ['required', 'string', 'max:255'],
            'image_categorie_service' => ['required', 'image' ,'mimes: jpg,jpeg,png'],
        ]);
        if($request->hasFile('image_categorie_service')){
            $filename = $request->image_categorie_service->getClientOriginalName();
            $urlimg = $request->image_categorie_service->storeAs('image_categorie_service' , $filename , 'public');
            $categorie_service = CategorieService::create([
                'type_service' => $request['type_service'],
                'image_categorie_service' => $urlimg,
                'user_id' => Auth::user()->id,
            ]);
        }
        return response()->json([
            'categorie_service' => $categorie_service,
            'success' => 'Ajout de la catégorie de service réussi!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Service::where('categorie_services_id',$id)->get();
        $technologies = Technologie::where('categorie_services_id',$id)->get();
        $categorie_service = CategorieService::findOrFail($id);
        return response()->json([
            'services' => $services,
            'technologies' => $technologies,
            'categorie_service' => $categorie_service
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
        $categorie_service = CategorieService::findOrFail($id);
        if($request->hasFile('image_categorie_service')){
            $filename = $request->image_categorie_service->getClientOriginalName();
            $logo = $request->image_categorie_service->storeAs('image_categorie_service' , $filename , 'public');
            $categorie_service->type_service = $request['type_service'];
            $categorie_service->image_categorie_service = $logo;
            $categorie_service->user_id = Auth::user()->id;
            $categorie_service->save();
        }
        else{
            $categorie_service->type_service = $request['type_service'];
            $categorie_service->user_id = Auth::user()->id;
            $categorie_service->save();
        }
        return ([
            'message' => 'Le categorie service à été mise à jour'
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
        $categorie_service = CategorieService::findOrFail($id);
        $categorie_service->delete();
        return ([
            'message' => 'Categorie service effacé',
        ]);
    }
}