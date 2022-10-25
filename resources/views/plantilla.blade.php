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
		<!-- inicio de header -->
		<nav class="navbar navbar-expand-lg bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="/">JuicyPC</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<!--
						<li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Home</a></li><li class="nav-item"><a class="nav-link" href="#">Link</a></li>
                        -->
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Tienda </a>
							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" href="#">Ordenadores premontados</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">Portátiles</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">Móviles</a>
								</li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li>
									<a class="dropdown-item" href="#">Componentes</a>
								</li>
								<li>
									<a class="dropdown-item" href="#">Periféricos</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Monta tu PC</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Centro de ayuda</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/cuenta">Cuenta</a>
						</li>
						<!--
						<li class="nav-item"><a class="nav-link disabled">Disabled</a></li>
                        -->
					</ul>
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Busca en JuicyPC..." aria-label="Search">
						<button class="btn btn-outline-success" type="submit">Buscar</button>
					</form>
				</div>
			</div>
		</nav>
		<!-- fin de header -->
		<div class="container"> @yield('content') </div>
		<!-- inicio de footer -->
		<div class="container">
			<footer class="py-5">
				<div class="row">
					<div class="col-6 col-md-2 mb-3">
						<h5>Section</h5>
						<ul class="nav flex-column">
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Home</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Features</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Pricing</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">FAQs</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">About</a>
							</li>
						</ul>
					</div>
					<div class="col-6 col-md-2 mb-3">
						<h5>Section</h5>
						<ul class="nav flex-column">
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Home</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Features</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Pricing</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">FAQs</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">About</a>
							</li>
						</ul>
					</div>
					<div class="col-6 col-md-2 mb-3">
						<h5>Section</h5>
						<ul class="nav flex-column">
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Home</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Features</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">Pricing</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">FAQs</a>
							</li>
							<li class="nav-item mb-2">
								<a href="#" class="nav-link p-0 text-muted">About</a>
							</li>
						</ul>
					</div>
					<div class="col-md-5 offset-md-1 mb-3">
						<form>
							<h5>Subscribe to our newsletter</h5>
							<p>Monthly digest of what's new and exciting from us.</p>
							<div class="d-flex flex-column flex-sm-row w-100 gap-2">
								<label for="newsletter1" class="visually-hidden">Email address</label>
								<input id="newsletter1" type="text" class="form-control" placeholder="Email address">
								<button class="btn btn-primary" type="button">Subscribe</button>
							</div>
						</form>
					</div>
				</div>
				<div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
					<p>&copy; 2022 JuicyPC, Inc. Todos los derechos reservados.</p>
				</div>
			</footer>
		</div>
		<!-- fin de footer -->
	</body>
</html>