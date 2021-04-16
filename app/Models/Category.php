<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $fillable = ["libelle", "description"];

    public function produits()
    {
        return $this->hasMany(Produit::class); //signifie qu'une catégorie peut avoir plusieurs produits
    }

}
