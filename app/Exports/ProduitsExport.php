<?php

namespace App\Exports;

//use Maatwebsite\Excel\Contracts\View\View;
use App\Models\Produit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

/*class ProduitsExport implements FromCollection
{

    public function collection()
    {
        return Produit::all();
    }
}*/


class ProduitsExport implements FromView
{


public function View():View
{
    return view('front-office._partial.list-produits',
    ['produits' => Produit::where("prix", ">", 5000)->get()
    ]);
}
}
