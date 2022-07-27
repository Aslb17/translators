<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f0dc6b;">
	<div class="container-fluid">
	  <a class="navbar-brand" href="#">ADMINISTRATION</a>
	  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-link active" aria-current="page" href="{{route('admin.index')}}">Traducteurs</a>
	      <a class="nav-link" href="{{route('admin.lang')}}">Langues</a>

	    </div>
	  </div>
	  <div class="text-end">
		<form action="{{route('logout')}}" method="post">
			@csrf
			<button type="submit" class="btn btn-outline-secondary mx-2 btn-lg">Déconnexion</button>
		</form>
	</div>
	<form action="{{route('index')}}" method="get">
		@csrf
		<button type="submit" class="btn btn-outline-secondary mx-2 btn-lg">Retour au site</button>
	</form>
	</div>
</nav>