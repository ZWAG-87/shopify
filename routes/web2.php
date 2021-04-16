<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Mail\ProduitAjoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [MainController::class, "accueil"])->name("accueil");
Route::resource("produits", ProduitController::class); // il affiche la page daccueil

Route::get('ajouter-produit', [MainController::class, "aàè_ç!!!!jouterProduit"]);
Route::get('update-produit', [MainController::class, "updateProduit"]);
Route::get('update-produit2', [MainController::class, "updateProduit2"]);
Route::get('update-produit3/{id}', [MainController::class, "updateProduit3"]);
Route::get('update-produit4/{produit}', [MainController::class, "updateProduit4"]); //Le paramètre garde toujours le même nom qu'au niveau de la function dans le controlleur

//Route::get("suppression-produit", [MainController::class, "supprimerProduit"]);  ou
Route::get("suppression-produit/{id}", [MainController::class, "supprimerProduit"]);
Route::get("create-category", [MainController::class, "createCategory"]);
Route::get("get-produit/{produit}", [MainController::class, "getProduit"]);
Route::get("commande", [MainController::class, "commande"]);

Route::get("test-collection", [MainController::class, "collection"]);
//Route::post("create-produit", [MainController::class, "create-produit"]);

Route::get("test-mail", function(){
    return new ProduitAjoute;
});
