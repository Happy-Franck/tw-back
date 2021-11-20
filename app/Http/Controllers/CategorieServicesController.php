<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Technologie;
use Illuminate\Http\Request;
use App\Models\CategorieService;

class CategorieServicesController extends Controller
{
    public function show($id)
    {
        $categorieService = CategorieService::findOrFail($id);
        $technologies = Technologie::all()->where('categorie_services_id', $categorieService->id);
        $services = Service::all()->where('categorie_services_id', $categorieService->id);
        return view('service.show')->with([
            'technologies' => $technologies,
            'services' => $services,
            'categorieService' => $categorieService
        ]);
    }
}
