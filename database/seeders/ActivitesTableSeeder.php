<?php

namespace Database\Seeders;

use App\Models\Activite;
use Illuminate\Database\Seeder;

class ActivitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Activite::create([
            'image_activite' => "/image_activite/conference.jpg",
            'titre' => "Conférence test",
            'description' => "Tiramisu pastry chocolate croissant macaroon carrot cake biscuit. Sweet candy dragée bonbon icing apple pie sesame snaps. Chupa chups croissant danish icing carrot cake cake apple pie cupcake chocolate. Gingerbread cake gummies candy candy marshmallow. Sweet pastry sweet macaroon cake. Dragée cake sweet pie croissant. Donut jelly beans liquorice tootsie roll jelly-o pudding jelly-o tootsie roll dessert.",
            'lieu' => "Madagascar Antananarivo Antanimena",
            'date' => "12-12-2021",
            'user_id' => 1,
        ]);
    }
}
