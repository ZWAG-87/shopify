@csrf
<div class="form-group">
    <label for="">Désignation</label>
    <input value="{{old('designation')?? $produit->designation }}" type="text" name="designation" id="designation" class="form-control" placeholder="" aria-describedby="helpId">
    @error('designation')
    <small class="text-danger">{{ $message }}</small>
    @enderror

  </div>

  <div class="form-group">
    <label for="">Prix</label>
    <input value="{{old('prix')?? $produit->prix }}" type="number" name="prix" id="prix" class="form-control" placeholder="" aria-describedby="helpId">
    @error('prix')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>


  <div class="form-group">
    <label for="category_id">Categorie</label>
    <select class="form-control" name="category_id" id="category_id">
      @foreach ($categories as $categorie)
        <option  {{ ($produit->category_id == $categorie->id OR old('category_id') ==  $categorie->id) ? "selected": ""}} value =" {{ $categorie->id }}"> {{ $categorie->libelle }}</option>
      @endforeach
    </select>
    @error('category_id')
    <small class="text-danger">{{ $message }}</small>
    @enderror
  </div>

  <div class="form-group">
    <label for="">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3">{{ old('description')?? $produit->description }}</textarea>
    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
   </div>

   <div class="form-group">
     <label for="">Image</label>
     <input type="file" class="form-control-file" name="image" id="image" placeholder="" aria-describedby="fileHelpId">
     <small id="fileHelpId" class="form-text text-muted"></small>
   </div>

  <button type="submit" class="btn btn-primary btn-block btn-lg" >Valider</button>
