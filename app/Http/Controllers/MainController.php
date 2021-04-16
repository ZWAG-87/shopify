<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProduitsExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller
{
    //
  public function accueil()
  {
      $produits = Produit::orderByDesc("id")->take(9)->get();
      return view("welcome",[
        "produits" => $produits,
      ]);

  }

    public function ajouterProduit()
    {
       $produit = Produit::create([
            "designation" => "Cahier",
            "description" => "C'est un cahier de dessin",
            "prix" => 500
        ]);

        dd($produit);
    }


    public function updateProduit()
    {
        # code...
      //  echo "Heloo world";
      $produit = Produit::first();
      dump($produit);
      $produit->designation = "Chemise";
      $produit->description = "Chemise blanche taille XXL";
      $produit->prix = 6000;
      $produit->save(); // persiste dans la base de données
      dd($produit);
    }


    public function updateProduit3($id)  //Renvoie le produit dont l'id = 3
    {
        # code...
      //  echo "Heloo world";
      $produit = Produit::findOrFail($id);
      //dump($produit);
      $produit->designation = "Chemise";
      $produit->description = "Chemise rouge verte taille M";
      $produit->prix = 6000;
      $produit->save(); // persiste dans la base de données
      dd($produit);
    }


    public function updateProduit4(Produit $produit)  //Renvoie un objet de type produit
    {
        # code...
      //  echo "Heloo world";
      //$produit = Produit::findOrFail($id);
      //dump($produit);
      $produit->designation = "Veste";
      $produit->description = "Veste rouge verte taille Z";
      $produit->prix = 6000;
      $produit->save(); // persiste dans la base de données
      dd($produit);
    }


    public function updateProduit2()
    {
       //$produit = Produit::find(2);
       //$produit = Produit::findOrFail(2);
       //dump($produit);
       $result = Produit::where("id", 2)->update([
         "designation" => "Tricot",
         "description" => "Tricot rouge jaune",
         "prix" => 3000
       ]);
       dd($result); //Affiche un booleen 0 ou 1
    }

   /* public function supprimerProduit()
    {
        //dd("Hello");
        $result = Produit::destroy(3);
        dd($result);
    }*/

    //ou


    public function supprimerProduit($id)
    {
        //dd("Hello");
        $result = Produit::destroy($id);
        dd($result);
    }

    public function createCategory()
    {
        $category = Category::create([
            "libelle" => "Chaussure",
            "description" => "catégorie chaussure"]);

        $produit = Produit::create([
            "category_id" => $category->id,
            "designation" => "Chaussure Nike",
            "description" => "C'est une chaussure Nike",
            "prix" => 500
        ]);
        dd($produit);
    }

    public function getProduit(Produit $produit)
    {
       // dd($produit);
        //dd($produit->category);   //affiche la catégorie correspondant au produit entré en paramètre
        $category = Category::first();
        dd($category, $category->produit);
    }

    public function commande()
    {
      /* $user = User::Create ([
            "name" => "Gwladys ZONGO",
            "email" => "gwladys.zongo@tic.gov.bf",
            "password" => Hash::make("glagl@"),  //La méthode hash permet de hacher notre mot de passe
        ]);*/

        //dd($user);
        $user = User::first();
        $produit1 = Produit::first();
        $produit2 = Produit::findOrFail(2);


        /*$user->produits()->attach($produit1->id);
        $user->produits()->attach($produit2);*/

        //$user->produits()->sync($produit1); //la méthode sync() permet de remplacer le dernier produit de la table
        $user->produits()->sync($produit2);
        //On lie le produit au user grâce à la methode attach() et produits() correspond à la méthode créée dans le modèle User
        dd($user->produits);
    }


    public function collection()
    {
        $collection1 = collect([
            collect([
                "titre" => "Mon livre 1",
                "prix" => 5000,
                "description" => "c'est le 1er livre"
            ]),
            collect([
                "titre" => "Mon livre 2",
                "prix" => 55000,
                "description" => "c'est le 2e livre"
            ]),
            collect([
                "titre" => "Mon livre 3",
                "prix" => 10000,
                "description" => "c'est le 3e livre"
            ]),
        ]);
       // dd($collection1->first()->get('titre'));

        $collection1->push([
            "titre" => "Mon livre 4",
                "prix" => 25000,
                "description" => "c'est le 4e livre"
        ]);
       // dd($collection1->first()->get('titre'));//affiche mon 1er livre de la collection
       $nouvelleCollection = $collection1->filter(function($livre, $key)
        {
        return $livre["prix"] >= 10000;
        });
       //dd($collection1->count()); //compter les éléments de la collection
       dd($nouvelleCollection);
    }


    public function exportProduits()
    {
       return Excel::download(new ProduitsExport, "produits.xlsx");
    }
}
