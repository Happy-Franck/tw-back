<?php

namespace Database\Seeders;

use App\Models\Recrutement;
use Illuminate\Database\Seeder;

class RecrutementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recrutement::create([
            'poste' => "Développeur Frontend",
            'profil' => "Cake sugar plum donut sweet cheesecake ice cream. Chocolate cake muffin chupa chups chocolate cake sweet roll gummi bears candy canes croissant.",
            'technologies' => "HTML,CSS,JS,SASS,REACT",
            'duree' => "12",
            'image_recrutement' => "/image_recrutement/a.png",
            'user_id' => 1,
        ]);
        Recrutement::create([
            'poste' => "Développeur Backend",
            'profil' => "Cake sugar plum donut sweet cheesecake ice cream. Chocolate cake muffin chupa chups chocolate cake sweet roll gummi bears candy canes croissant.",
            'technologies' => "PHP,LARAVEL",
            'duree' => "10",
            'image_recrutement' => "/image_recrutement/a.png",
            'user_id' => 1,
        ]);
    }
}
