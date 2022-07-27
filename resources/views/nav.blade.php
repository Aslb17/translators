<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container-fluid">
	  <a class="navbar-brand" href="{{route('index')}}">Mini-projet</a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	      <li class="nav-item">
		<a class="nav-link active" aria-current="page" href="{{route('index')}}">Accueil</a>
	      </li>
	      <li class="nav-item">
		<a class="nav-link" href="{{route('traducteurs')}}">Nos traducteurs</a>
	      </li>
	    </ul>
	  </div>
	  <div class="text-end">
		@if(!Auth::user())
	  	<button type="button" class="btn btn-outline-primary"><a href="{{route('register')}}"> S'enregistrer </a>
		</button>
	  	<button type="button" class="btn btn-outline-primary"><a href="{{route('login')}}"> Se connecter </a></div>
		</button>
		@else
		<button type="button" class="btn btn-outline-primary"><a href="{{route('admin.index')}}"> Administration </a>
		</button>
		@endif

	</div>
      </nav>
    