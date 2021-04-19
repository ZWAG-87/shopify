<x-master-layout title=" | Produits" >
<div class="container" >
<div class="row" >
        <div class="col-md-12" >
           <h1 class="text-center"> TOUS NOS PRODUITS</h1>

@if(session('statut') )
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    {{ session('statut')  }}
    </div>
@endif

<div>
    <a href="{{ route('produits.create') }}" class="btn btn-success btn-sm">
        <i class="fas fa-plus    "></i>
        Ajouter
    </a>

    <a href="{{ route('export') }}" class="btn btn-success btn-sm">
        <i class="fas fa-download"></i>
        Exporter
    </a>
</div>

           <script>
             $(".alert").alert();
           </script>

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Désignation</th>
                    <th>Categorie</th>
                    <th>Libelle</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($produits as $produit)
                <tr>
                    <td>{{  $produit->designation}}</td>
                    <td>{{  $produit->category ? $produit->category->libelle: "Non catégorisé"}}</td>
                    <td>{{  $produit->description}}</td>
                    <td>{{  formatPrixBf($produit->prix)}}</td>
                    <td class="d-flex">
                        <a href="{{ route('produits.edit', $produit) }}" class="btn btn-primary btn-sm mr-2"> <i class="fas fa-edit"></i> </a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="suppressionConfirm('{{ $produit->id }}')"> <i class="fas fa-trash"></i> </a>
                         <form id="{{ $produit->id}}" method="post" action="{{ route('produits.destroy', $produit->id)  }}">
                           @csrf
                           @method("DELETE")
                         </form>
                         <a href="{{ route('produits.show', $produit) }}" class="btn btn-success btn-sm ml-2"> <i class="fas fa-eye"></i> </a>

                        </td>
                </tr>

            @endforeach

            </tbody>
        </table>
        <div class="mt-5 d-flex justify-content-center">
         {{  $produits->links()    }}
         </div>
        </div>
    </div>
</div>



</x-master-layout>
