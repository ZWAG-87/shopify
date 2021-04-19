<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "libelle" => "Sac à main",
            "description" => "La description du sac à main",
        ]);
        Category::create([
            "libelle" => "Sac à pied",
            "description" => "La description du sac à main",
        ]);
        Category::create([
            "libelle" => "vetement",
            "description" => "La description du sac à main",
        ]);

        // Category::factory(10)->has(Produit::factory(50))->create();
        //On créé 10 catégories et dans chaque catégorie, il ya 50 produits ou
        //Category::factory(10)->hasProduit(50)->create();
    }
}
