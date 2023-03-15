@extends('plantilla')
@section('content')
 
<h1 class="mb-5">Almacenes</h1>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#modalCrearProd">
  Crear almacenes
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

            <label for="address">Dirección:</label>
            <input type="text" name="address" id="address" class="form-control" required><br>

            <label for="contact">Contacto:</label>
            <input type="email" name="contact" id="contact" class="form-control" required><br>

            <input type="submit" value="Crear" class="btn btn-outline-success">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<table id="stores" class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Dirección</th>
          <th>Contacto</th>
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
            // Obtener la lista de stores
            $.ajax({
                url: "http://127.0.0.1:8000/api/stores",
                method: "GET",
                success: function(data) {
                    // Agregar los stores a la tabla
                    $.each(data.data, function(index, store) {
                        var fila = "<tr>" +
                            "<td>" + store.id + "</td>" +
                            "<td>" + store.name + "</td>" +
                            "<td>" + store.address + "</td>" +
                            "<td>" + store.contact + "</td>" +
                            "<td>" +
                                "<button class='btn btn-outline-primary' onclick='editarStore(" + store.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                "<button class='btn btn-outline-danger' onclick='eliminarStore(" + store.id + ")'>Eliminar</button>" +
                            "</td>" +
                        "</tr>";
                        $("#stores tbody").append(fila);
                    });
                }
            });

            // Enviar el formulario para crear un store
            $("#formulario").submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "http://127.0.0.1:8000/api/stores",
                    method: "POST",
                    data: formData,
                    success: function(data) {
                        // Agregar el nuevo store a la tabla
                        var store = data.store;
                        var fila = "<tr>" +
                            "<td>" + store.id + "</td>" +
                            "<td>" + store.name + "</td>" +
                            "<td>" + store.address + "</td>" +
                            "<td>" + store.contact + "</td>" +
                            "<td>" +
                                "<button class='btn btn-outline-primary' onclick='editarStore(" + store.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                "<button class='btn btn-outline-danger' onclick='eliminarStore(" + store.id + ")'>Eliminar</button>" + "</td>" + "</tr>";
                        $("#stores tbody").append(fila);                    // Limpiar el formulario
                    $("#formulario")[0].reset();
                }
            });
            location.reload();
        });
    });

    function editarStore(id) {
        // Obtener el store a editar
        $.ajax({
            url: "http://127.0.0.1:8000/api/stores/" + id + "/edit",
            method: "GET",
            success: function(data) {
                var store = data.store;
                console.log(store);

                // Llenar el formulario con los datos del producto
                $("#name").val(store.name);
                $("#address").val(store.address);
                $("#contact").val(store.contact);
                $("#product_id").val(store.product_id);

                // Cambiar el botón de "Crear" a "Actualizar"
                var boton = $("#formulario input[type='submit']");
                boton.val("Actualizar");
                boton.off("click").on("click", function(event) {
                    event.preventDefault();

                    // Enviar el formulario actualizado
                    var formData = $("#formulario").serialize();
                    $.ajax({
                        url: "http://127.0.0.1:8000/api/stores/" + id,
                        method: "PUT",
                        data: formData,
                        success: function(data) {
                            // Actualizar los datos del producto en la tabla
                            var store = data.store;
                            var fila = "<tr>" +
                                "<td>" + store.id + "</td>" +
                                "<td>" + store.name + "</td>" +
                                "<td>" + store.address + "</td>" +
                                "<td>" + store.contact + "</td>" +
                                "<td>" +
                                    "<button class='btn btn-outline-primary' onclick='editarStore(" + store.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                    "<button class='btn-outline-danger' onclick='eliminarStore(" + store.id + ")'>Eliminar</button>" +
                                "</td>" +
                            "</tr>";
                            $("#stores tbody tr:nth-child(" + (id + 1) + ")").replaceWith(fila);

                            // Limpiar el formulario
                            $("#formulario")[0].reset();
                            boton.val("Crear");
                            boton.off("click").on("click", function(event) {
                                event.preventDefault();
                                var formData = $("#formulario").serialize();
                                $.ajax({
                                    url: "http://127.0.0.1:8000/api/stores",
                                    method: "POST",
                                    data: formData,
                                    success: function(data) {
                                        var store = data.store;
                                        var fila = "<tr>" +
                                            "<td>" + store.id + "</td>" +
                                            "<td>" + store.name + "</td>" +
                                            "<td>" + store.address + "</td>" +
                                            "<td>" + store.contact + "</td>" +
                                            "<td>" +
                                                "<button class='btn btn-outline-primary' onclick='editarStore(" + store.id + ")' data-bs-toggle='modal' data-bs-target='#modalCrearProd'>Editar</button> " +
                                                "<button class='btn-outline-danger' onclick='eliminarStore(" + store.id + ")'>Eliminar</button>" +
                                            "</td>" +
                                        "</tr>";
                                        $("#stores tbody").append(fila);
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

    function eliminarStore(id) {
        // Confirmar que se desea eliminar el producto
        if (confirm("¿Estás seguro de que deseas eliminar este almacen?")) {
            // Eliminar el producto
            $.ajax({
              url: "http://127.0.0.1:8000/api/stores/" + id,
                method: "DELETE",
                success: function() {
                    // Eliminar la fila de la tabla correspondiente al producto elimino
                    $("#stores tbody tr:nth-child(" + (id + 1) + ")").remove();
                }
            });
            location.reload();
        }
    }
</script>

@endsection