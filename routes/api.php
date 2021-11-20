<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ServicesController;
use App\Http\Controllers\api\ActivitesController;
use App\Http\Controllers\api\PersonnelsController;
use App\Http\Controllers\api\PartenairesController;
use App\Http\Controllers\api\RecrutementsController;
use App\Http\Controllers\api\TechnologiesController;
use App\Http\Controllers\api\CategorieServicesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post("/login", [AuthController::class,'login']);

Route::middleware('auth:sanctum')->prefix("/admin")->group(function(){
    //profil
    Route::post("/logout", [AuthController::class,'logout']);
    Route::get("/profil", [AuthController::class,'showprofil']);
    Route::post("/profil", [AuthController::class,'updateprofil']);
    //recrutement
    Route::post("/recrutement", [RecrutementsController::class, 'store']);
    Route::get("/recrutement", [RecrutementsController::class, 'index']);
    Route::get("/recrutement/{id}", [RecrutementsController::class, 'show']);
    Route::post("/recrutement/{id}", [RecrutementsController::class, 'update']);    //utilise form-encoded
    Route::delete("/recrutement/{id}", [RecrutementsController::class, 'destroy']);
    //activite
    Route::post("/activite", [ActivitesController::class, 'store']);
    Route::get("/activite", [ActivitesController::class, 'index']);
    Route::get("/activite/{id}", [ActivitesController::class, 'show']);
    Route::post("/activite/{id}", [ActivitesController::class, 'update']);    //utilise form-encoded
    Route::delete("/activite/{id}", [ActivitesController::class, 'destroy']);
    //partenaire
    Route::post("/partenaire", [PartenairesController::class, 'store']);
    Route::get("/partenaire", [PartenairesController::class, 'index']);
    Route::get("/partenaire/{id}", [PartenairesController::class, 'show']);
    Route::post("/partenaire/{id}", [PartenairesController::class, 'update']);    //utilise form-encoded
    Route::delete("/partenaire/{id}", [PartenairesController::class, 'destroy']);
    //categorie_service
    Route::post("/categorie_service", [CategorieServicesController::class, 'store']);
    Route::get("/categorie_service", [CategorieServicesController::class, 'index']);
    Route::get("/categorie_service/{id}", [CategorieServicesController::class, 'show']);
    Route::post("/categorie_service/{id}", [CategorieServicesController::class, 'update']);    //utilise form-encoded
    Route::delete("/categorie_service/{id}", [CategorieServicesController::class, 'destroy']);
    //service
    Route::post("/service", [ServicesController::class, 'store']);
    Route::get("/service", [ServicesController::class, 'index']);
    Route::get("/service/{id}", [ServicesController::class, 'show']);
    Route::post("/service/{id}", [ServicesController::class, 'update']);    //utilise form-encoded
    Route::delete("/service/{id}", [ServicesController::class, 'destroy']);
    //technologie
    Route::post("/technologie", [TechnologiesController::class, 'store']);
    Route::get("/technologie", [TechnologiesController::class, 'index']);
    Route::get("/technologie/{id}", [TechnologiesController::class, 'show']);
    Route::post("/technologie/{id}", [TechnologiesController::class, 'update']);    //utilise form-encoded
    Route::delete("/technologie/{id}", [TechnologiesController::class, 'destroy']);
    //personnel
    Route::post("/personnel", [PersonnelsController::class, 'store']);
    Route::get("/personnel", [PersonnelsController::class, 'index']);
    Route::get("/personnel/{id}", [PersonnelsController::class, 'show']);
    Route::post("/personnel/{id}", [PersonnelsController::class, 'update']);    //utilise form-encoded
    Route::delete("/personnel/{id}", [PersonnelsController::class, 'destroy']);
    Route::get("/personnel/{id}/archiver", [PersonnelsController::class, 'archiver']);
    Route::get("/personnel/{id}/desarchiver", [PersonnelsController::class, 'desarchiver']);
    Route::get("/personnel/{id}/badge", [PersonnelsController::class, 'export_badge']);
    Route::get("/personnel/{id}/contrat-de-travail", [PersonnelsController::class, 'export_contrat']);
    Route::get("/personnel/{id}/attestation-de-stage", [PersonnelsController::class, 'export_attestation_de_stage']);
});