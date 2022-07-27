@extends('templateAdmin')

@section('content')

<div class="container-fluid text-center"> 
	<h3 class="mt-5">Bienvenue dans votre espace de configuration</h3>

    </div>
    <a href="{{ route('admin.create') }}" class="btn btn-secondary"><i class="fas fa-plus"></i>  Ajouter un traducteur </a>
    <table class="table table-striped">
    <div class="container">
	<table class="table table-striped mt-3">
	    <thead>
		<tr>
		    <th class="text-center">Image</th>
		    <th class="text-center">Prénom</th>
		    <th class="text-center">Nom</th>
		    <th class="text-center">Langue</th>
		    <th class="text-center">Email</th>
		    <th class="text-center">Téléphone</th>
		    <th class="text-center">Actions</th>
		</tr>
	    </thead>
	    <tbody>
		@if($message = Session::get('success'))
		<div class="alert alert-success alert-block">
		    <button type="button" class="btn-close text-end" data-bs-dismiss="alert"></button>
		    <strong>{{ $message }}</strong>
		</div>
		@endif
		@foreach($traducteurs as $traducteur)
		<tr>
		    <td><img src="{{ asset('images/trad/'.$traducteur['image']) }}" alt="{{$traducteur['nom']}}" width="100"></td>
		    <td class="text-center">{{ $traducteur->prenom }}</td>
		    <td class="text-center">{{ $traducteur->nom }}</td>
		    <td class="text-center">
			{{ $traducteur->langue->libelle}}
			<br>
			<img src="{{ 'images/'.$traducteur->langue->image }}" alt="{{ $traducteur->langue->image }}" width="30"> 
		    </td> 
		    <td class="text-center">{{ $traducteur->email }}</td>
		    <td class="text-center">{{ $traducteur->tel }}</td>
			<td class="text-center">
				<a href="{{ route('admin.edit', $traducteur->id) }}" class="btn btn-warning">
					<i class="fas fa-edit"></i>
				</a>
				<a  href="{{ route('admin.delete', $traducteur->id) }}" class="btn btn-danger" 
				onclick="return confirm('Etes-vous sûr de vouloir supprimer cette fiche ?')">
				<i class="fas fa-trash"></i>
				</a>
		    </td>
		</tr>
		@endforeach
	    </tbody>
	</table>
	</div>
@endsection