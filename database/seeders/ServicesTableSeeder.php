<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'nom' => "Site vitrine",
            'description' => "Sugar plum liquorice lollipop apple pie bonbon cupcake marzipan cookie lollipop. Wafer powder jujubes carrot cake oat cake. Muffin danish dessert biscuit topping gummi bears jelly-o chupa chups. Toffee topping gummies danish dessert. Cake ice cream liquorice marzipan dragée. Candy wafer pastry sweet roll cookie donut donut gummi bears caramels.",
            'image_service' => "/image_service/1c075c31e8b96ed82cd095ef35bfce64_resultat.jpg",
            'categorie_services_id' => 1,
        ]);
        Service::create([
            'nom' => "Application android",
            'description' => "Sugar plum liquorice lollipop apple pie bonbon cupcake marzipan cookie lollipop. Wafer powder jujubes carrot cake oat cake. Muffin danish dessert biscuit topping gummi bears jelly-o chupa chups. Toffee topping gummies danish dessert. Cake ice cream liquorice marzipan dragée. Candy wafer pastry sweet roll cookie donut donut gummi bears caramels.",
            'image_service' => "/image_service/_60_color_picker_resultat.jpg",
            'categorie_services_id' => 2,
        ]);
    }
}
