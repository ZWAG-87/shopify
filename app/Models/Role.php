<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    public $filable = ["profil"];
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
        //hasmany : il a plusieurs rôles dc relation 1.n, plusieurs utilisateurs peuvent avoir le même rôle
    }

}
