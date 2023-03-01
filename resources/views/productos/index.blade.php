@extends('plantilla') @section('content') <div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h1>Lista de productos</h1>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal"> Agregar producto </button>
			<table id="productos" class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Descripción</th>
						<th>Marca</th>
						<th>Categoría</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal de agregar producto -->
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="agregarModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="agregarModalLabel">Agregar producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="agregarForm">
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="price">Precio</label>
						<input type="number" class="form-control" id="price" name="price">
					</div>
					<div class="form-group">
						<label for="description">Descripción</label>
						<textarea class="form-control" id="description" name="description"></textarea>
					</div>
					<div class="form-group">
						<label for="brand">Marca</label>
						<input type="text" class="form-control" id="brand" name="brand">
					</div>
					<div class="form-group">
						<label for="category">Categoría</label>
						<select class="form-control" id="category" name="category">
							<option value="">Seleccione una categoría</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="agregarBtn">Agregar</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal de actualizar producto -->
<div class="modal fade" id="actualizarModal" tabindex="-1" role="dialog" aria-labelledby="actualizarModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="actualizarModalLabel">Actualizar producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="actualizarForm">
					<div class="form-group">
						<label for="updateName">Nombre</label>
						<input type="text" class="form-control" id="updateName" name="name">
					</div>
					<div class="form-group">
						<label for="updatePrice">Precio</label>
						<input type="number" class="form-control" id="updatePrice" name="price">
					</div>
					<div class="form-group">
						<label for="updateDescription">Descripción</label>
						<textarea class="form-control" id="updateDescription" name="description"></textarea>
					</div>
					<div class="form-group">
						<label for="updateBrand">Marca</label>
						<input type="text" class="form-control" id="updateBrand" name="brand">
					</div>
					<div class="form-group">
						<label for="updateCategory">Categoría</label>
						<select class="form-control" id="updateCategory" name="category">
							<option value="">Seleccione una categoría</option>
						</select>
					</div>
					<input type="hidden" name="id" id="updateId">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="actualizarBtn">Actualizar</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal de eliminar producto -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="eliminarModalLabel">Eliminar producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body"> ¿Está seguro que desea eliminar el producto? <input type="hidden" name="id" id="eliminarId">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-danger" id="eliminarBtn">Eliminar</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>
	$(document).ready(function() {
				// Obtener listado de productos al cargar la página
				getProductos();
				// Obtener listado de categorías al cargar la página
				getCategorias();
				// Agregar producto
				$('#agregarBtn').click(function() {
					var form_data = $('#agregarForm').serialize();
					$.ajax({
						url: 'http://127.0.0.1:8000/api/productos',
						type: 'POST',
						data: form_data,
						dataType: 'json',
						success: function(response) {
							$('#agregarModal').modal('hide');
							getProductos();
							$('#agregarForm')[0].reset();
						},
						error: function(response) {
							var errors = response.responseJSON.errors;
							var errorsHtml = ' < ul > ';
							$.each(errors, function(key, value) {
								errorsHtml += ' < li > ' + value[0] + ' < /li>';
							});
							errorsHtml += ' < /ul>';
							$('#agregarErrors').html(errorsHtml);
						}
					});
				});
				// Obtener producto por id para mostrar datos en formulario de edición
				$(document).on('click', '.editarBtn', function() {
							var id = $(this).data('id');
							$.ajax({
									url: '{{ route('
									productos.show ', ': id ') }}'.replace(':id', id),
									type: 'GET',
									dataType: 'json',
									success: function(response) {
										$('#updateId').val(response.producto.id);
										$('#updateName').val(response.producto.name);
										$('#updatePrice').val(response.producto.price);
										$('#updateDescription').val(response.producto.description);
										$('#updateBrand').val(response.producto.brand);
										$.each(response.categorias, function(key, value) {
												var selected = '';
												if (value.id == response.producto.category_id) {
													selected = 'selected';
												}
												$('#updateCategory').append(' < option value = "' + value.id + '"
													' + selected + ' > ' + value.name + ' < /option>');
												}); $('#actualizarModal').modal('show');
										}
									});
							});
						// Actualizar producto
						$('#actualizarBtn').click(function() {
							var form_data = $('#actualizarForm').serialize();
							var id = $('#updateId').val();
							$.ajax({
								url: '{{ route('
								productos.update ', ': id ') }}'.replace(':id', id),
								type: 'PUT',
								data: form_data,
								dataType: 'json',
								success: function(response) {
									$('#actualizarModal').modal('hide');
									getProductos();
									$('#actualizarForm')[0].reset();
								},
								error: function(response) {
									var errors = response.responseJSON.errors;
									var errorsHtml = ' < ul > ';
									$.each(errors, function(key, value) {
										errorsHtml += ' < li > ' + value[0] + ' < /li>';
									});
									errorsHtml += ' < /ul>';
									$('#actualizarErrors').html(errorsHtml);
								}
							});
						});
						// Obtener producto por id para mostrar confirmación de eliminación
						$(document).on('click', '.eliminarBtn', function() {
							var id = $(this).data('id');
							$('#eliminarId').val(id);
							$('#eliminarModal').modal('show');
						});
						// Eliminar producto
						$('#eliminarBtn').click(function() {
							var id = $('#eliminarId').val();
							$.ajax({
								url: '{{ route('
								productos.destroy ', ': id ') }}'.replace(':id', id),
								type: 'DELETE',
								dataType: 'json',
								success: function(response) {
									$('#eliminarModal').modal('hide');
									getProductos();
								}
							});
						});
						// Obtener listado de productos
						function getProductos() {
							$.ajax({
								url: 'http://127.0.0.1:8000/api/productos',
								type: 'GET',
								dataType: 'json',
								success: function(response) {
									var productosHtml = '';
									$.each(response.productos, function(key, value) {
										productosHtml += ' < tr > ';
										productosHtml += ' < td > ' + value.id + ' < /td>';
										productosHtml += ' < td > ' + value.name + ' < /td>';
										productosHtml += ' < td > ' + value.price + ' < /td>';
										productosHtml += ' < td > ' + value.description + ' < /td>';
										productosHtml += ' < td > ' + value.brand + ' < /td>';
										productosHtml += ' < td > ' + value.category.name + ' < /td>';
										productosHtml += ' < td > < button class = "btn btn-primary editarBtn"
										data - id = "' + value.id + '" > Editar < /button> < button class = "btn btn-danger eliminarBtn"
										data - id = "' + value.id + '" > Eliminar < /button> < /td>';
										productosHtml += ' < /tr>';
									});
									$('#productos').html(productosHtml);
								}
							});
						}
						// Obtener listado de categorías para select de creación de producto
						function getCategoriasCreate() {
							$.ajax({
								url: '{{ route('
								categorias.index ') }}',
								type: 'GET',
								dataType: 'json',
								success: function(response) {
									var categoriasHtml = '';
									$.each(response.categorias, function(key, value) {
										categoriasHtml += ' < option value = "' + value.id + '" > ' + value.name + ' < /option>';
									});
									$('#createCategory').html(categoriasHtml);
								}
							});
						}
						// Obtener listado de categorías para select de edición de producto
						function getCategoriasUpdate() {
							$.ajax({
								url: '{{ route('
								categorias.index ') }}',
								type: 'GET',
								dataType: 'json',
								success: function(response) {
									var categoriasHtml = '';
									$.each(response.categorias, function(key, value) {
										categoriasHtml += ' < option value = "' + value.id + '" > ' + value.name + ' < /option>';
									});
									$('#updateCategory').html(categoriasHtml);
								}
							});
						}
						// Cargar listado de productos y categorías al cargar la página
						$(document).ready(function() {
							getProductos();
							getCategoriasCreate();
							getCategoriasUpdate();
						});
@endsection