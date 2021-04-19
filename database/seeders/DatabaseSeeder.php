<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\Category;
use App\Models\User;
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
     /*  $this->call([
            CategorySeeder::class,
        ]);*/
       /* Category::factory(10)->create();
       Produit::factory(10)->create();

       User::factory(10)->create();*/
       $this->call([
        RoleSeeder::class,
        CategorySeeder::class,
    ]);
    }
}
