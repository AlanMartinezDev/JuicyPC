@extends('plantilla')
@section('content')

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalCrearProd">
  Crear categoria
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

            <input type="submit" value="Crear" class="btn btn-outline-success">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ---------------------------------------------------------------------------------------------- -->
    <table id="categorias" class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
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
                url: "http://127.0.0.1:8000/api/categorias",
                method: "GET",
                success: function(data) {
                    // Agregar los productos a la tabla
                    $.each(data.data, function(index, categoria) {
                        var fila = "<tr>" +
                            "<td>" + categoria.id + "</td>" +
                            "<td>" + categoria.name + "</td>" +
                            "<td>" +
                                "<button class='btn btn-outline-primary' onclick='editarCategoria(" + categoria.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                "<button class='btn btn-outline-danger' onclick='eliminarCategoria(" + categoria.id + ")'>Eliminar</button>" +
                            "</td>" +
                        "</tr>";
                        $("#categorias tbody").append(fila);
                    });
                }
            });

            // Enviar el formulario para crear un producto
            $("#formulario").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "http://127.0.0.1:8000/api/categorias",
                    method: "POST",
                    data: formData,
                    success: function(data) {
                        // Agregar el nuevo producto a la tabla
                        var categoria = data.categoria;
                        var fila = "<tr>" +
                            "<td>" + categoria.id + "</td>" +
                            "<td>" + categoria.name + "</td>" +
                            "<td>" +
                                "<button class='btn btn-outline-primary' onclick='editarCategoria(" + categoria.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                "<button class='btn btn-outline-danger' onclick='eliminarCategoria(" + categoria.id + ")'>Eliminar</button>" + "</td>" + "</tr>";
                        $("#categorias tbody").append(fila);                    // Limpiar el formulario
                    $("#formulario")[0].reset();
                }
            });
            location.reload();
        });
    });

    function editarCategoria(id) {
        // Obtener el producto a editar
        $.ajax({
            url: "http://127.0.0.1:8000/api/categorias/" + id + "/edit",
            method: "GET",
            success: function(data) {
                var categoria = data.categoria;
                console.log(categoria);

                // Llenar el formulario con los datos del producto
                $("#name").val(categoria.name);

                // Cambiar el botón de "Crear" a "Actualizar"
                var boton = $("#formulario input[type='submit']");
                boton.val("Actualizar");
                boton.off("click").on("click", function(event) {
                    event.preventDefault();

                    // Enviar el formulario actualizado
                    var formData = $("#formulario").serialize();
                    $.ajax({
                        url: "http://127.0.0.1:8000/api/categorias/" + id,
                        method: "PUT",
                        data: formData,
                        success: function(data) {
                            // Actualizar los datos del producto en la tabla
                            var categoria = data.categoria;
                            var fila = "<tr>" +
                                "<td>" + categoria.id + "</td>" +
                                "<td>" + categoria.name + "</td>" +
                                "<td>" +
                                    "<button class='btn-outline-primary' onclick='editarCategoria(" + categoria.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                    "<button class='btn-outline-danger' onclick='eliminarCategoria(" + categoria.id + ")'>Eliminar</button>" +
                                "</td>" +
                            "</tr>";
                            $("#categorias tbody tr:nth-child(" + (id + 1) + ")").replaceWith(fila);

                            // Limpiar el formulario
                            $("#formulario")[0].reset();
                            boton.val("Crear");
                            boton.off("click").on("click", function(event) {
                                event.preventDefault();
                                var formData = $("#formulario").serialize();
                                $.ajax({
                                    url: "http://127.0.0.1:8000/api/categorias",
                                    method: "POST",
                                    data: formData,
                                    success: function(data) {
                                        var categoria = data.categoria;
                                        var fila = "<tr>" +
                                            "<td>" + categoria.id + "</td>" +
                                            "<td>" + categoria.name + "</td>" +
                                            "<td>" +
                                                "<button class='btn-outline-primary' onclick='editarCategoria(" + categoria.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                                "<button class='btn-outline-danger' onclick='eliminarCategoria(" + categoria.id + ")'>Eliminar</button>" +
                                            "</td>" +
                                        "</tr>";
                                        $("#categorias tbody").append(fila);
                                        $("#formulario")[0].reset();
                                    }
                                });
                            });
                            location.reload();
                        }
                    });
                });
            }
        });
    }

    function eliminarCategoria(id) {
        // Confirmar que se desea eliminar el producto
        if (confirm("¿Estás seguro de que deseas eliminar esta categoria?")) {
            // Eliminar el producto
            $.ajax({
              url: "http://127.0.0.1:8000/api/categorias/" + id,
                method: "DELETE",
                success: function() {
                    // Eliminar la fila de la tabla correspondiente al producto elimino
                    $("#categorias tbody tr:nth-child(" + (id + 1) + ")").remove();
                }
            });
            location.reload();
        }
    }
</script>

@endsection

