<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    public $fillable = ["category_id", "designation", "description", "prix", "image"]; //Nous autorisons cette liste d'éléments à recevoir des données lors de l'appel de la méthode create()
                        // Dans ce cas, nous n'avons pas le contrôle des éléments c'est à dire que nous ne manipulons pas directement les champs
    public  function category()
    {
        return $this->belongsTo(Category::class); //signifie que le produits appartient à une catégorie donc la relation 1,n
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
