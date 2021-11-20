<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(CategorieServicesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(TechnologiesTableSeeder::class);
        $this->call(ActivitesTableSeeder::class);
        $this->call(RecrutementsTableSeeder::class);
        $this->call(PartenairesTableSeeder::class);
    }
}
