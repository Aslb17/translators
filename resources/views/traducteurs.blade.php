@extends('template')

@section('content')
<div class="container"></div>
<table class="table table-striped mt-3">
    <thead>
        <tr>
            <th class="text-center">Image</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Langue</th>
            <th class="text-center">En détails</th>
        </tr>
    </thead>
    <tbody>
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
	        <td class="text-center">
                <button type="button"  class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal{{ $traducteur->id }}">
                    En savoir +
                </button>
            </td>
        </tr>
        <div class="modal fade" id="modal{{ $traducteur->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $traducteur->prenom }} {{ $traducteur->nom }}</h5> <br>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                            Numéro de téléphone : {{ $traducteur->tel }}
                            <br>
                            Adresse mail : {{ $traducteur->email }}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </tbody>
</table>

@endsection