<?php

namespace Database\Seeders;

use App\Models\Partenaire;
use Illuminate\Database\Seeder;

class PartenairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partenaire::create([
            'image_partenaire' => "/image_partenaire/Section-Google.jpg",
            'nom' => "Google",
            'url' => "www.google.com",
            'user_id' => 1,
        ]);
        Partenaire::create([
            'image_partenaire' => "/image_partenaire/580b57fcd9996e24bc43c545.png",
            'nom' => "Yutube",
            'url' => "www.youtube.com",
            'user_id' => 1,
        ]);
    }
}
