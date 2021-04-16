

<div class="container">
    <br>
    <h4>de</h2>
	<br>
	<div class="row" id="ads">
    <!-- Category Card -->
    <div class="col-md-8 offset-2">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">Low KMS</span>
                <span class="card-notify-year">2018</span>
                <img class="img-fluid" src="https://imageonthefly.autodatadirect.com/images/?USER=eDealer&PW=edealer872&IMG=USC80HOC011A021001.jpg&width=440&height=262" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
                <span class="card-detail-badge">Used</span>
                <span class="card-detail-badge">$28,000.00</span>
                <span class="card-detail-badge">13000 Kms</span>
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                    <h5>Honda Accord LX</h5>
                </div>
                <a class="ad-btn" href="#">View</a>
            </div>
        </div>
    </div>



</div>
</div>
<div class="form-group">
    <label for="">Désignation</label>
    <input value="{{$produit->designation }}" type="text" name="designation" id="designation" class="form-control" placeholder="" aria-describedby="helpId">

  </div>

  <div class="form-group">
    <label for="">Prix</label>
    <input value="{{ $produit->prix }}" type="number" name="prix" id="prix" class="form-control" placeholder="" aria-describedby="helpId">
  </div>


  <div class="form-group">
    <label for="category_id">Categorie</label>

    <input value="{{ $produit->category->libelle }}" type="number" name="categorie" id="prix" class="form-control" placeholder="" aria-describedby="helpId">


  </div>

  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ $produit->description }}</textarea>
   </div>

   <div class="form-group">
     <label for="">Image</label>
     <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
     <small id="fileHelpId" class="form-text text-muted"></small>
   </div>
