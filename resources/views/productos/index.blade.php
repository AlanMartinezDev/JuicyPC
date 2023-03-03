@extends('plantilla')
@section('content')
<div class="row">
    <div class="row mb-3">
        <h1>Productos</h1>
    </div>
    <div class="col">
        <div class="row mb-3 justify-content-center">
            @if(isset(auth::user()->role) && auth::user()->role == 'admin')
                <div class="col-2">
                    <a href="{{ route('productos.create') }}" type="button" class="btn btn-outline-dark">Crear producto</a>
                </div>
            @endif
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" id="productos"></div>
    </div>
</div>
<form id="crear-producto-form">
  <div class="mb-3">
    <label for="brand" class="form-label">Marca</label>
    <input type="text" class="form-control" id="brand" name="brand" required>
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Descripción</label>
    <textarea class="form-control" id="description" name="description" required></textarea>
  </div>
  <div class="mb-3">
    <label for="price" class="form-label">Precio</label>
    <input type="number" class="form-control" id="price" name="price" required>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Imagen</label>
    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
  </div>
  <div class="mb-3">
    <label for="categoria" class="form-label">Categoria id</label>
    <input type="text" class="form-control" id="categoria" name="cat_id" required>
  </div>
  <button type="submit" class="btn btn-primary">Crear producto</button>
</form>

	<script>
		// función index
		$(document).ready(function() {
			$.ajax({
				url: "http://127.0.0.1:8000/api/productos",
				type: "GET",
				dataType: "json",
				success: function(response) {
					var productos = response.data;
					var output = '';
					$.each(productos, function(index, producto) {
						output += '<div class="col">';
						output += '<div class="card h-100">';
						output += '<img src="' + producto.image + '" class="card-img-top" alt="...">';
						output += '<div class="card-body">';
                        output += '<h5 class="card-title"><a href="http://127.0.0.1:8000/api/productos/" data-id="' + producto.id + '" class="producto-link text-decoration-none">' + producto.brand + ' | ' + producto.name + '</a></h5>';
                        //output += '<h5 class="card-title"><a href="http://127.0.0.1:8000/api/productos/' + producto.id + '" class="text-decoration-none">' + producto.brand + ' | ' + producto.name + '</a></h5>';
						output += '<p class="card-text">' + producto.description + '</p>';
						output += '<p class="card-text fw-bold">' + producto.price + '€</p>';
						output += '</div>';
						output += '</div>';
						output += '</div>';
						if ((index+1) % 4 == 0) {
							output += '<div class="w-100"></div>';
						}
					});
					$('#productos').html(output);
				}
			});
		});

        // función show
        $(document).on('click', '.producto-link', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "http://127.0.0.1:8000/api/productos/" + id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    var producto = response.data;
                    var output = '';
                    output += '<div class="row">';
                    output += '<div class="col">';
                    output += '<img src="' + producto.image + '" class="img-fluid" alt="...">';
                    output += '</div>';
                    output += '<div class="col">';
                    output += '<h1>' + producto.brand + ' | ' + producto.name + '</h1>';
                    output += '<p>' + producto.description + '</p>';
                    output += '<p class="fw-bold">' + producto.price + '€</p>';
                    output += '</div>';
                    output += '</div>';
                    $('#productos').html(output);
                }
            });
        });

        // función store
        $(document).on('submit', '#crear-producto-form', function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
            url: "http://127.0.0.1:8000/api/productos",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                var producto = response.data;
                var output = '';
                output += '<div class="row">';
                output += '<div class="col">';
                output += '<img src="' + producto.image + '" class="img-fluid" alt="...">';
                output += '</div>';
                output += '<div class="col">';
                output += '<h1>' + producto.brand + ' | ' + producto.name + '</h1>';
                output += '<p>' + producto.cat_id + " " + producto.description + '</p>';
                output += '<p class="fw-bold">' + producto.price + '€</p>';
                output += '</div>';
                output += '</div>';
                $('#productos').append(output);
                $('#crear-producto-modal').modal('hide');
                $('#crear-producto-form')[0].reset();
                location.reload(); // Agregue esta línea para recargar la página
                },
            error: function(error) {
                console.log(error.responseJSON);
                }
            });
        });

	</script>

@endsection
