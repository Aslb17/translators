@extends('templateAdmin')

@section('content')
<div class="row">
  <div class="offset-3 col-6">
    <div class="card mt-3" >
      <div class="card-header text-center">
        Nouveau traducteur
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data">
          @csrf
          @if($errors->any())
            <div class="alert alert-danger" role="alert">
              <ul>
                @foreach($errors->all() as $error)

                  <li>{{ $error }}</li>
                
                @endforeach
              </ul>
            </div>
          @endif

          <div class="mb-1">
            <input type="text" class="form-control" id="prenom"  name="prenom" placeholder="Prénom">
            @error('prenom')
            <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
            @enderror
          </div>

          <div class="mb-1">
              <input type="text" class="form-control" id="nom"  name="nom" placeholder="Nom">
              @error('auteur')
                <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
              @enderror
          </div>

          <div class="mb-1">
            <label for="image" class="form-label">Photo</label>
            <input type="file" class="input-file form-control" id="image"  name="image" >
            <div class="form-text"></div>
          </div>
            
            <div class="mb-1">
              <label for="langue" class="form-label">Langue</label>
              <select class="form-select" aria-label="Default select example" name="id_langue">
                <option selected>Choisissez une langue</option>
                @foreach($langues as $langue)
                <option value="{{$langue->id}}">{{$langue->libelle}}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-1">
              <input type="text" class="form-control" id="tel"  name="tel" placeholder="Numéro de téléphone sous la forme xx.xx.xx.xx.xx">
              @error('tel')
                <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
              @enderror
            </div>

            <div class="mb-1">
              <input type="text" class="form-control" id="email"  name="email" placeholder="Adresse email">
              @error('email')
                <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
              @enderror
            </div>
              
            <button type="submit" class="btn btn-primary col-12">Créer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

