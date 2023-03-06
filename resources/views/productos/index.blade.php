@extends('plantilla')
@section('content')
<div class="row">
	<div class="row mb-3">
		<h1>Productos</h1>
	</div>
	<div class="col">
		<div class="row mb-3 justify-content-center"> @if(isset(auth::user()->role) && auth::user()->role == 'admin') @endif </div>
		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4" id="productos"></div>
	</div>
</div>
<form id="crear-producto-form" enctype="multipart/form-data">
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

<!--<form id="editar-producto-form" enctype="multipart/form-data">
  
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
  <button type="submit" class="btn btn-primary">Actualizar producto</button>
</form>-->

  

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
				},
        error: function(error) {
              console.log(error.responseJSON);
      }});
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
                    output += '<button type="button" class="btn btn-danger eliminar-producto-btn" data-id="' + producto.id + '">Eliminar</button>';
                    output += '</div>';
                    output += '</div>';
                    output += '<form id="editar-producto-form" data-id="' + producto.id + '" enctype="multipart/form-data">';
                    output += '<div class="mb-3">';
                    output += '<label for="brand" class="form-label">Marca</label>';
                    output += '<input type="text" class="form-control" id="brand" name="brand" required>';
                    output += '</div>';
                    output += '<div class="mb-3">';
                    output += '<label for="name" class="form-label">Nombre</label>';
                    output += '<input type="text" class="form-control" id="name" name="name" required>';
                    output += '</div>';
                    output += '<div class="mb-3">';
                    output += '<label for="description" class="form-label">Descripción</label>';
                    output += '<textarea class="form-control" id="description" name="description" required></textarea>';
                    output += '</div>';
                    output += '<div class="mb-3">';
                    output += '<label for="price" class="form-label">Precio</label>';
                    output += '<input type="number" class="form-control" id="price" name="price" required>';
                    output += '</div>';
                    output += '<div class="mb-3">';
                    output += '<label for="image" class="form-label">Imagen</label>';
                    output += '<input type="file" class="form-control" id="image" name="image" accept="image/*" required>';
                    output += '</div>';
                    output += '<div class="mb-3">';
                    output += '<label for="categoria" class="form-label">Categoria id</label>';
                    output += '<input type="text" class="form-control" id="categoria" name="cat_id" required>';
                    output += '</div>';
                    /*output += '<div class="mb-3">';
                    output += '<label for="user" class="form-label">User id</label>';
                    output += '<input type="text" class="form-control" id="user" name="user_id" required>';
                    output += '</div>';*/
                    output += '<button type="submit" class="btn btn-primary">Actualizar producto</button>';
                    output += '</form>';
                    $('#productos').html(output);
                },
            error: function(error) {
              console.log(error.responseJSON);
            }});
        });

        // función store
        $(document).on('submit', '#crear-producto-form', function(e) {
          e.preventDefault();
          var formData = new FormData(this);
          console.log(formData);
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
            },
            error: function(error) {
              console.log(error.responseJSON);
            }});
            location.reload();
        });

        // función delete
        $(document).on('click', '.eliminar-producto-btn', function(e) {
          e.preventDefault();
          var productoId = $(this).data('id');
          $.ajax({
            url: "http://127.0.0.1:8000/api/productos/" + productoId,
            type: "DELETE",
            success: function(response) {
              $('#producto-' + productoId).remove();
              location.href = "http://127.0.0.1:8000/productos";
            },
            error: function(error) {
              console.log(error.responseJSON);
            }});
        });

       // función update
       $(document).on('submit', '#editar-producto-form', function(e) {
          e.preventDefault();
          var formData = new FormData(this);
          console.log(formData);
          //alert($(this).attr("data-id"));
          var productoId = $(this).attr("data-id") //$(this).data('id');
          
          $.ajax({
            url: "http://127.0.0.1:8000/api/productos/" + productoId,
            type: "PUT",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
              var producto = response.producto;
              console.log(response)
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
              $('#producto-' + producto.id).html(output);
              $('#editar-producto-modal').modal('hide');
              $('#editar-producto-form')[0].reset();
            },
            error: function(error) {
              console.log(error.responseJSON);
            }});
            //location.reload();
            
        });
            
	</script>

@endsection
