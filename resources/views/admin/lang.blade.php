@extends('templateAdmin')

@section('content')

<div class="container-fluid text-center"> 
	<h5>Voici les langues actuellement enregistrées sur votre site</h5>
</div>
<a href="{{ route('admin.createl') }}" class="btn btn-secondary"><i class="fas fa-plus"></i>  Ajouter une langue </a>
    <table class="table table-striped">
    <div class="container">
	<table class="table table-striped mt-3">
	    <thead>
		<tr>
		    <th class="text-center">id</th>
		    <th class="text-center">Langue</th>
		    <th class="text-center">Drapeau</th>
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
		@foreach($langues as $langue)
		<tr>
			<td class="text-center">{{ $langue->id }}</td>
			<td class="text-center">{{ $langue->libelle }}</td>
		    	<td class="text-center"><img src="{{ asset('images/'.$langue['image']) }}" alt="{{$langue['libelle']}}" width="50" class="rounded"></td>
			<td class="text-center">
				<a href="{{ route('admin.editl', $langue->id) }}" class="btn btn-warning">
					<i class="fas fa-edit"></i>
				</a>
				<a  href="{{ route('admin.deletel', $langue->id) }}" class="btn btn-danger" 
				onclick="return confirm('Etes-vous sûr de vouloir supprimer cette langue ?')">
				<i class="fas fa-trash"></i>
				</a>
		    </td>
		</tr>
		@endforeach
	    </tbody>
	</table>
	</div>
@endsection