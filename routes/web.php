<?php

use App\Models\User;
use App\Models\Partenaire;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ActivitesController;
use App\Http\Controllers\PartenairesController;
use App\Http\Controllers\RecrutementsController;
use App\Http\Controllers\CategorieServicesController;
use App\Http\Controllers\MessageController;
use App\Models\CategorieService;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = User::findOrFail(1);
    $partenaires = Partenaire::all();
    $services = CategorieService::all();
    return view('accueil')->with([
        'user' => $user,
        'partenaires' => $partenaires,
        'services' => $services
    ]);
});

//partenaire
Route::get('/partenaires', [PartenairesController::class, 'index'])->name('partenaire.index');
Route::get('/partenaires/{id}', [PartenairesController::class, 'show'])->name('partenaire.show');

//recrutement
Route::get('/recrutements', [RecrutementsController::class, 'index'])->name('recrutement.index');
Route::get('/recrutements/{id}', [RecrutementsController::class, 'show'])->name('recrutement.show');
Route::post('/postuler', [RecrutementsController::class,'postuler'])->name('recrutement.postuler');

//recrutement
Route::get('/activites', [ActivitesController::class, 'index'])->name('activite.index');
Route::get('/activites/{id}', [ActivitesController::class, 'show'])->name('activite.show');


//service
Route::get('/services/{id}', [CategorieServicesController::class, 'show'])->name('service.show');

//contact
Route::get('/contact', [ContactController::class, 'form'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'contacter'])->name('contact.post');

//email
Route::get('/message', [MessageController::class,'formMessageGoogle']);
Route::post('/message', [MessageController::class,'sendMessageGoogle'])->name('send.message.google');




