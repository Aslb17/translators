@extends('templateAdmin')

@section('content')
<div class="row">
  <div class="offset-3 col-6">
    <div class="card mt-3" >
      <div class="card-header text-center">
        Nouvelle langue
      </div>
      <div class="card-body">
        <form method="post" action="{{ route('admin.storel') }}" enctype="multipart/form-data">
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
            <input type="text" class="form-control" id="libelle"  name="libelle" placeholder="Libellé de la langue à ajouter">
            @error('libelle')
            <strong class="text-danger mt-2" role="alert">{{ $message }}</strong>
            @enderror
          </div>

          <div class="mb-1">
            <label for="image" class="form-label">Drapeau</label>
            <input type="file" class="input-file form-control" id="image"  name="image" >
            <div class="form-text"></div>
          </div>
            
          <button type="submit" class="btn btn-primary col-12">Ajouter cette langue</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection