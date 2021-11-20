<?php

namespace Database\Seeders;

use App\Models\Technologie;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Technologie::create([
            'nom' => "Laravel",
            'image_technologie' => "/image_technologie/1200px-Laravel.svg.png",
            'categorie_services_id' => 1,
        ]);
        Technologie::create([
            'nom' => "Angular",
            'image_technologie' => "/image_technologie/5847ea22cef1014c0b5e4833.png",
            'categorie_services_id' => 1,
        ]);
        Technologie::create([
            'nom' => "Laravel",
            'image_technologie' => "/image_technologie/a.png",
            'categorie_services_id' => 2,
        ]);
    }
}
