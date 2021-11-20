<?php

namespace Database\Seeders;

use App\Models\CategorieService;
use Illuminate\Database\Seeder;

class CategorieServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategorieService::create([
            'image_categorie_service' => "/image_categorie_service/7eee2181141576534bed5954fc1645f3_resultat.jpg",
            'type_service' => "Développement Web",
            'user_id' => 1,
        ]);
        CategorieService::create([
            'image_categorie_service' => "/image_categorie_service/5d2c2512469b3af5aed8496d90e27114.png",
            'type_service' => "Développement Mobile",
            'user_id' => 1,
        ]);
    }
}
