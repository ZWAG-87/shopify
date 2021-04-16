
              <table class="table table-light">
                <thead class="thead-light">
                    <tr>
                        <th>Désignation</th>
                        <th>Categorie</th>
                        <th>Libelle</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($produits as $produit)
                    <tr>
                        <td>{{  $produit->designation}}</td>
                        <td>{{  $produit->category ? $produit->category->libelle: "Non catégorisé"}}</td>
                        <td>{{  $produit->description}}</td>
                        <td>{{  formatPrixBf($produit->prix)}}</td>

                    </tr>

                @endforeach

                </tbody>
            </table>



