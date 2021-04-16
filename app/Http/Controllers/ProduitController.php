<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitFormRequest;
use App\Mail\ProduitAjoute;
use App\Models\Category;
use App\Models\Produit;
use App\Models\User;
use App\Notifications\ModificationProduit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $produits = Produit::all();  //Affiche toutes les données de la table produits
       $produits = Produit::orderByDesc("id")->paginate(15);//Recupère 15 produits par page

       // dump ($produits);  //renvoie toutes les collections et permet d'inspecter une variable
      /*  $produit = new Produit;  //instanciation du modèle Produit
        $produit->designation = 'Livre';
        $produit->description = 'La description du livre';
        $produit->prix = 1000;
        $produit->save();  //permet de sauvegarder l'enregistrement
        */
        //$produit500 = Produit::where("prix", 500)->get(); //retourne les produits dont le prix = 500 et le get() retourne le résultat sous forme de collection
       // $produit500 = Produit::where(["prix"=> 500, "designation"=>"Livre"])->get(); //where prix = and designation
       // $produit500 = Produit::find(10); //recherche l'id 1
       // $produit500 = Produit::findOrfail(10); //lors de la recherche, si il ne trouve pas il affiche un message pour spécifier mains si on met find tout simplement, il va afficher une erreur
        //$premier = Produit::first(); //affiche le 1er élément de la table
        //dd($premier);      //dd = dump and die ce qui signifie qu'il parcours l'objet et met fin lorsqu'il aura terminé

        return view("front-office.produits.index", ["produits" => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //$categories doit être le même que $categories dans create.blade.php
         $produit = new Produit;
         $categories = Category::all();  //récupère toutes les categorie de la table qui seront utilisées dans la liste déroulante
        return view("front-office.produits.create", [
                    "categories" => $categories,
                    "produit"=>$produit]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProduitFormRequest $request)
    {

       /* $request-> validate([
            "designation" => "required|min:3|max:50|unique:produits",
            "prix" =>"required|numeric|between:500,1000000",
            "description" =>"required|max:200",
            "category_id" =>"required|numeric"
        ]);*/
       // dd($request->designation);
       //$imageName='produit.jpg';
       if($request->file('image')){
        $imageName=time().$request->file("image")->getClientOriginalName();
        $request->file('image')->storeAs('uploads/produits', $imageName);
       }

       //dd($imageName);

       $request->session()->put("imageName", $imageName);  //On transmet une variable session


      $produit = Produit::create([
            "designation" => $request->designation,
            "prix"  => $request->prix,
            "category_id"  => $request->category_id,
            "description"  => $request->description,
            "image" => $imageName,
        ]);


        $user = User::first();
        if($user)
        Mail::to($user)->send(new ProduitAjoute);
        return redirect()->route('produits.index')->with("statut", "Produit créé avec succès!");
        //dd($produit);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //dd($produit);
        $categories = Category::all();

        return view("front-office.produits.show", ["produit" => $produit, "categories" => $categories,]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produit $produit) //il s'agit du model binding
    {
        //dd($id);
        $categories = Category::all();

        return view("front-office.produits.edit", ["produit" => $produit, "categories" => $categories,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProduitFormRequest $request, $id)
    {
        /*
$request->validate([
    "designation" => "required|min:3|max:50",
    "prix" =>"required|numeric|between:500,1000000",
    "description" =>"required|max:200",
    "category_id" =>"required|numeric"
]);*/
//$imageName = time().$request->file("imageName"->getClientOriginalName());
 // $request->session()->put("imageName", $imageName);
 if($request->file('image')){
    $imageName=time().$request->file("image")->getClientOriginalName();
    $request->file('image')->storeAs('public/uploads/produits', $imageName);
   }

        Produit::where("id", $id)-> update([
            "designation" =>  $request-> designation,
            "prix" => $request-> prix,
            "category_id" => $request-> category_id,
            "description" => $request-> description,
          "image" => $imageName,
        ]);

        $user = User::first();
        if($user)
       // Mail::to($user)->send(new ProduitAjoute);
       $user->notify(new ModificationProduit);

        return redirect()->route('produits.index')->with("statut", "Produit a été modifié!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Produit::destroy($id);
        {

            return redirect()->route('produits.index')->with("statut", "Produit supprimé avec succès!");
        }
    }


    //A NE PAS EFFACER
}
