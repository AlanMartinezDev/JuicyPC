@extends('plantilla')
@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalCrearProd">
  Crear productos
</button>

<!-- Modal -->
<div class="modal fade" id="modalCrearProd" tabindex="-1" aria-labelledby="modalCrearProdLavel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCrearProdLavel">form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="formulario">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" required><br>

            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" class="form-control" required><br>

            <label for="description">Descripción:</label>
            <textarea name="description" id="description" class="form-control" required></textarea><br>

            <label for="brand">Marca:</label>
            <input type="text" name="brand" id="brand" class="form-control" required><br>

            <label for="cat_id">Categoría:</label>
            <input type="number" name="cat_id" id="cat_id" class="form-control" required><br>

            <input type="submit" value="Crear" class="btn btn-outline-success">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- --------------------------------------------------   -->


<!--div class="row mb-5">
        <form id="formulario">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control"><br>

            <label for="price">Precio:</label>
            <input type="number" name="price" id="price" class="form-control"><br>

            <label for="description">Descripción:</label>
            <textarea name="description" id="description" class="form-control"></textarea><br>

            <label for="brand">Marca:</label>
            <input type="text" name="brand" id="brand" class="form-control"><br>

            <label for="cat_id">Categoría:</label>
            <input type="number" name="cat_id" id="cat_id" class="form-control"><br>

            <input type="submit" value="Crear" class="btn btn-outline-success">
        </form>
</div-->

    <table id="productos" class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Descripción</th>
          <th>Marca</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <!-- Aquí van los datos de la tabla -->
      </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtener la lista de productos
            $.ajax({
                url: "http://127.0.0.1:8000/api/productos",
                method: "GET",
                success: function(data) {
                    // Agregar los productos a la tabla
                    $.each(data.data, function(index, producto) {
                        var fila = "<tr>" +
                            "<td>" + producto.id + "</td>" +
                            "<td>" + producto.name + "</td>" +
                            "<td>" + producto.price + "</td>" +
                            "<td>" + producto.description + "</td>" +
                            "<td>" + producto.brand + "</td>" +
                            "<td>" +
                                "<button class='btn btn-outline-primary' onclick='editarProducto(" + producto.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                "<button class='btn btn-outline-danger' onclick='eliminarProducto(" + producto.id + ")'>Eliminar</button>" +
                            "</td>" +
                        "</tr>";
                        $("#productos tbody").append(fila);
                    });
                }
            });

            // Enviar el formulario para crear un producto
            $("#formulario").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "http://127.0.0.1:8000/api/productos",
                    method: "POST",
                    data: formData,
                    success: function(data) {
                        // Agregar el nuevo producto a la tabla
                        var producto = data.producto;
                        var fila = "<tr>" +
                            "<td>" + producto.id + "</td>" +
                            "<td>" + producto.name + "</td>" +
                            "<td>" + producto.price + "</td>" +
                            "<td>" + producto.description + "</td>" +
                            "<td>" + producto.brand + "</td>" +
                            "<td>" +
                                "<button class='btn btn-outline-primary' onclick='editarProducto(" + producto.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                "<button class='btn btn-outline-danger' onclick='eliminarProducto(" + producto.id + ")'>Eliminar</button>" + "</td>" + "</tr>";
                        $("#productos tbody").append(fila);                    // Limpiar el formulario
                    $("#formulario")[0].reset();
                }
            });
            location.reload();
        });
    });

    function editarProducto(id) {
        // Obtener el producto a editar
        $.ajax({
            url: "http://127.0.0.1:8000/api/productos/" + id + "/edit",
            method: "GET",
            success: function(data) {
                var producto = data.producto;
                console.log(producto);

                // Llenar el formulario con los datos del producto
                $("#name").val(producto.name);
                $("#price").val(producto.price);
                $("#description").val(producto.description);
                $("#brand").val(producto.brand);
                $("#cat_id").val(producto.cat_id);

                // Cambiar el botón de "Crear" a "Actualizar"
                var boton = $("#formulario input[type='submit']");
                boton.val("Actualizar");
                boton.off("click").on("click", function(event) {
                    event.preventDefault();

                    // Enviar el formulario actualizado
                    var formData = $("#formulario").serialize();
                    $.ajax({
                        url: "http://127.0.0.1:8000/api/productos/" + id,
                        method: "PUT",
                        data: formData,
                        success: function(data) {
                            // Actualizar los datos del producto en la tabla
                            var producto = data.producto;
                            var fila = "<tr>" +
                                "<td>" + producto.id + "</td>" +
                                "<td>" + producto.name + "</td>" +
                                "<td>" + producto.price + "</td>" +
                                "<td>" + producto.description + "</td>" +
                                "<td>" + producto.brand + "</td>" +
                                "<td>" +
                                    "<button class='btn btn-outline-primary' onclick='editarProducto(" + producto.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                    "<button class='btn-outline-danger' onclick='eliminarProducto(" + producto.id + ")'>Eliminar</button>" +
                                "</td>" +
                            "</tr>";
                            $("#productos tbody tr:nth-child(" + (id + 1) + ")").replaceWith(fila);

                            // Limpiar el formulario
                            $("#formulario")[0].reset();
                            boton.val("Crear");
                            boton.off("click").on("click", function(event) {
                                event.preventDefault();
                                var formData = $("#formulario").serialize();
                                $.ajax({
                                    url: "http://127.0.0.1:8000/api/productos",
                                    method: "POST",
                                    data: formData,
                                    success: function(data) {
                                        var producto = data.producto;
                                        var fila = "<tr>" +
                                            "<td>" + producto.id + "</td>" +
                                            "<td>" + producto.name + "</td>" +
                                            "<td>" + producto.price + "</td>" +
                                            "<td>" + producto.description + "</td>" +
                                            "<td>" + producto.brand + "</td>" +
                                            "<td>" +
                                                "<button class='btn btn-outline-primary' onclick='editarProducto(" + producto.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                                "<button class='btn-outline-danger' onclick='eliminarProducto(" + producto.id + ")'>Eliminar</button>" +
                                            "</td>" +
                                        "</tr>";
                                        $("#productos tbody").append(fila);
                                        $("#formulario")[0].reset();
                                    }
                                });
                            });
                        }
                    });
                    //El location va al final del primer bloque ajax de la funcion
                    location.reload();
                });
            }
        });
    }

    function eliminarProducto(id) {
        // Confirmar que se desea eliminar el producto
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            // Eliminar el producto
            $.ajax({
              url: "http://127.0.0.1:8000/api/productos/" + id,
                method: "DELETE",
                success: function() {
                    // Eliminar la fila de la tabla correspondiente al producto elimino
                    $("#productos tbody tr:nth-child(" + (id + 1) + ")").remove();
                }
            });
            location.reload();
        }
    }
</script>

@endsection

