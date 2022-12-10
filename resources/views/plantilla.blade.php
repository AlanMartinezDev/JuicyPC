<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>JuicyPC</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
		<!-- Font Awesome CDN Kit -->
		<script src="https://kit.fontawesome.com/3e35ab0863.js" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container p-2">
			<!-- inicio de header -->
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<a class="navbar-brand" href="{{ url('/') }}">JuicyPC</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item d-flex ms-3">
								<i class="fa-solid fa-shop align-self-center" style="color:grey;"></i>
								<a class="nav-link" href="{{ url('/productos') }}">Productos</a>
							</li>
							<li class="nav-item d-flex ms-3">
								<i class="fa-solid fa-tags align-self-center" style="color:grey;"></i>
								<a class="nav-link" href="{{ url('/categorias') }}">Categorías</a>
							</li>
							<li class="nav-item d-flex ms-3">
								<i class="fa-solid fa-cart-shopping align-self-center" style="color:grey;"></i>
								<a class="nav-link" href="{{ url('/carrito') }}">Carrito 
									@if(count(Cart::getContent()) > 0)
									({{ count(Cart::getContent()) }})
									@endif
								</a>
							</li>
							<li class="nav-item d-flex ms-3" style="color:grey;">
								<i class="fa-solid fa-headset align-self-center"></i>
								<a class="nav-link" href="{{ url('/centro-de-ayuda') }}">Centro de ayuda</a>
							</li>
							@if(isset( auth::user()->name ))
							<li class="nav-item dropdown d-flex ms-3">
								<i class="fa-solid fa-user align-self-center" style="color:grey;"></i>
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ auth::user()->name }} </a>
								<ul class="dropdown-menu">
									@if( auth::user()->role == 'admin' )
										<li>
											<a class="dropdown-item" href="{{ url('/admin') }}">Administración</a>
										</li>
									@endif
									<li>
										<a class="dropdown-item" href="{{ url('/cuenta') }}">Cuenta</a>
									</li>
									<li>
										<a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
									</li>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
								</ul>
							</li>
							@else
							<li class="nav-item d-flex ms-3">
								<i class="fa-solid fa-user align-self-center" style="color:grey;"></i>
								<a class="nav-link" href="{{ url('/cuenta') }}">Cuenta</a>
							</li>
							@endif
						</ul>
						<form class="d-flex" role="search">
							<input class="form-control me-2" type="search" placeholder="Busca en JuicyPC..." aria-label="Search">
							<button class="btn btn-outline-success" type="submit">Buscar</button>
						</form>
					</div>
				</div>
			</nav>
		</div>
		<!-- fin de header -->
		<div class="container"> @yield('content') </div>
		<!-- inicio de footer -->
		<div class="container">
			<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
				<p class="col-md-4 mb-0 text-muted"><a class="nav-link" href="/">&copy; 2022 JuicyPC</a></p>
			</footer>
		</div>
		<!-- fin de footer -->
	</body>
</html>