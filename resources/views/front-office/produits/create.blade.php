<x-master-layout title=" | Création" >>
    <div class="container" >
    <div class="row" >
            <div class="col-md-6 offset-3" >
               <h1 class="text-center"> CREATION D'UN PRODUIT</h1>
               <form method="post" action="{{ route('produits.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                   @include('front-office._partial.produit-form')
               </form>
            </div>
        </div>

    </div>
    </x-master-layout>
