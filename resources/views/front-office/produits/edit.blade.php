<x-master-layout title=" | Edition" >>
    <div class="container" >
    <div class="row" >
            <div class="col-md-6 offset-3" >
               <h1 class="text-center"> MODIFICATION D'UN PRODUIT</h1>
               <form method="post" action="{{ route('produits.update', $produit) }}" enctype="multipart/form-data">

                @method('PUT')
                @include('front-office._partial.produit-form')
               </form>
            </div>
        </div>

    </div>
    </x-master-layout>
