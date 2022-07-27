@extends('templateAdmin')

@section('content')
<div class="row">
  <div class="offset-3 col-6">
    <div class="card mt-3" >
      <div class="card-header text-center">
        Modifier cette fiche
      </div>
      <div class="card-body">
          <form method="post" action="{{ route('admin.update', $traducteur->id) }}" enctype="multipart/form-data">
            @method('put')  
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
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" value="{{ $traducteur->prenom }}" class="form-control" id="prenom"  name="prenom" placeholder="Prénom">
                @error('prenom')
                <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
                @enderror
              </div>

	            <div class="mb-1">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" value="{{ $traducteur->nom }}" class="form-control" id="nom"  name="nom" placeholder="Nom">
                @error('nom')
                <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
                @enderror
              </div>

              <div class="mb-1">
                <label for="langue" class="form-label">Langue parlée</label>
                <select class="form-select" aria-label="Default select example" name="id_langue">
                      @foreach ($langues as $langue)
                      <option value="{{$langue->id}}">{{$langue->libelle}}</option>
                      @endforeach
                </select>
              </div>

              <div class="mb-1">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="input-file form-control" id="image" name="image" >
                <div id="emailHelp" class="form-text">
                  <img src="{{asset('images/trad/'.$traducteur->image)}}" class="img-thumbnail "alt="{{ $traducteur->nom }}" width="150">
                </div>
              </div>

              <div class="mb-1">
                <label for="tel" class="form-label">Numéro de téléphone</label>
                <input type="text" value="{{ $traducteur->tel }}"class="form-control" id="tel"  name="tel" placeholder="Numéro de téléphone sous la forme xx.xx.xx.xx.xx">
                @error('tel')
                  <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
                @enderror
              </div>
  
              <div class="mb-1">
                <label for="tel" class="form-label">Adresse email</label>
                <input type="text" value="{{ $traducteur->email }}"class="form-control" id="email"  name="email" placeholder="Adresse email">
                @error('email')
                  <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
                @enderror
              </div>
              
              <button type="submit" class="btn btn-warning col-12">Modifier</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection
