<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "nom_entreprise" => "Tanora Web",
            "adresse_siege_social" => "Lot AV 97 Ambohikely Loharanombato",
            "gerant" => "RAMITANDRINTSOA Toky Nantenaina",
            "debut_d_activite"=> "2021-05-08",
            "telephone" => "0347987772",
            "numero_rcs" => "00420",
            "mail_de_contact" => "solofonirina35@gmail.com",
            "logo" => "/MH82743-6_512x512.jpg",
            "email" => "tanoraweb@gmail.com", //change to tanoraweb3012@gmail.com
            "password" => Hash::make("tanoraweb"), //change to tanoraweb3012
        ]);
    }
}
