<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>JuicyPC</title>
		<!-- CSS only -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container p-2">
			<!-- inicio de header -->
			<nav class="navbar navbar-expand-lg">
				<div class="container-fluid">
					<a class="navbar-brand" href="/">JuicyPC</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav me-auto mb-2 mb-lg-0">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Tienda </a>
								<ul class="dropdown-menu">
									<li>
										<a class="dropdown-item" href="/tienda/premontados">Ordenadores premontados</a>
									</li>
									<li>
										<a class="dropdown-item" href="/tienda/portatiles">Portátiles</a>
									</li>
									<li>
										<a class="dropdown-item" href="/tienda/moviles">Móviles</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li>
										<a class="dropdown-item" href="/tienda/componentes">Componentes</a>
									</li>
									<li>
										<a class="dropdown-item" href="/tienda/perifericos">Periféricos</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/monta-tu-pc">Monta tu PC</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/centro-de-ayuda">Centro de ayuda</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/cuenta">Cuenta</a>
							</li>
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
				<ul class="nav col-md-4 justify-content-end">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle px-2 text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Tienda </a>
						<ul class="dropdown-menu">
							<li>
								<a class="dropdown-item" href="/tienda/premontados">Ordenadores premontados</a>
							</li>
							<li>
								<a class="dropdown-item" href="/tienda/portatiles">Portátiles</a>
							</li>
							<li>
								<a class="dropdown-item" href="/tienda/moviles">Móviles</a>
							</li>
							<li>
								<hr class="dropdown-divider">
							</li>
							<li>
								<a class="dropdown-item" href="/tienda/componentes">Componentes</a>
							</li>
							<li>
								<a class="dropdown-item" href="/tienda/perifericos">Periféricos</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="/monta-tu-pc" class="nav-link px-2 text-muted">Monta tu PC</a>
					</li>
					<li class="nav-item">
						<a href="/centro-de-ayuda" class="nav-link px-2 text-muted">Centro de ayuda</a>
					</li>
					<li class="nav-item">
						<a href="/cuenta" class="nav-link px-2 text-muted">Cuenta</a>
					</li>
				</ul>
			</footer>
		</div>
		<!-- fin de footer -->
	</body>
</html>