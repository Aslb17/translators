@extends('templateAdmin')

@section('content')
<div class="row">
  <div class="offset-3 col-6">
    <div class="card mt-3" >
      <div class="card-header text-center">
        Modifier cette langue
      </div>
      <div class="card-body">
          <form method="post" action="{{ route('admin.updatel', $langue->id) }}" enctype="multipart/form-data">
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
                <label for="libelle" class="form-label">Libellé</label>
                <input type="text" value="{{ $langue->libelle }}" class="form-control" id="libelle"  name="libelle" placeholder="Libellé">
                @error('libelle')
                <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
                @enderror
              </div>

              <div class="mb-1">
                <label for="image" class="form-label">Drapeau</label>
                <input type="file" class="input-file form-control" id="image" name="image" >
                <div id="emailHelp" class="form-text">
                  <img src="{{asset('images/'.$langue->image)}}" class="img-thumbnail "alt="{{ $langue->libelle }}" width="50">
                </div>
              </div>

              <button type="submit" class="btn btn-warning col-12">Modifier</button>
            </form>
      </div>
    </div>
  </div>
</div>
@endsection
