<?php

namespace App\Providers;

use App\Models\User;
use App\Models\CategorieService;
use App\Models\Technologie;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts/app', function ($view) {
            $categorieServices = CategorieService::all();
            $technologies = Technologie::take(3)->get();
            $user = User::findOrFail(1);
            //dd($categorieServices);
            $view->with([
                'categorieServices' => $categorieServices,
                'technologies' => $technologies,
                'user' => $user
            ]);
        });
        view()->composer('layouts/app2', function ($view) {
            $categorieServices = CategorieService::all();
            $technologies = Technologie::take(3)->get();
            $user = User::findOrFail(1);
            //dd($categorieServices);
            $view->with([
                'categorieServices' => $categorieServices,
                'technologies' => $technologies,
                'user' => $user
            ]);
        });
    }
}
