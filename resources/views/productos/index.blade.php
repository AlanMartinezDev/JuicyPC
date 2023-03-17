@extends('plantilla')
@section('content')

<!-- Button trigger modal -->
<button type="button" id="modal" class="btn btn-primary mb-3 ms-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">form</h1>
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

<div class="row row-cols-1" id="contenido">
    <div class="col">
        
    </div>
</div>

<div class="container">
  <div class="row producto-container">
    <!-- La información del producto se agregará aquí -->
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
       /* async function getToken() {        
        try {

            const response = await fetch('http://localhost:8000/token');
            const json = await response.json();
            window.localStorage.setItem("token", json.token);        

        }
        catch(error) {           
            console.log('error obtenint token')
        }

    }*/
        //SCRIPT PARA VISTA USUARIO NORMAL O NOT AUTH
            document.getElementById('productos').style.display = 'none';
            document.getElementById('modal').style.display = 'none';
   
            
            // Obtener la lista de productos
           $.ajax({
                url: "http://127.0.0.1:8000/api/productos",
                method: "GET",
                success: function(data) {
                    // Agregar los productos a la vista
                    var productosHTML = "";
                    var count = 0; // Contador para productos en cada fila
                    $.each(data.data, function(index, producto) {
                        if (count % 4 == 0) { // Si ya hay 4 productos en la fila, cerrar y abrir una nueva fila
                            productosHTML += "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4'>";
                        }
                        productosHTML +=
                        "<div class='col'>" +
                        "<div class='card'>" +
                        "<img src='" + producto.image + "' class='card-img-top' alt='...'>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'><a href='/productos/show/" + producto.id + "' class='text-decoration-none'>" + producto.brand + " " + producto.name + "</a></h5>" +
                        "<p class='card-text'>" + producto.description + "</p>" +
                        "<p class='card-text fw-bold'>" + producto.price + "€</p>" +
                        "<div class='row'>" +
                        "<div class='col d-flex justify-content-end'>" +
                        "<form action='/carrito/add' method='post'>" +
                        "<input type='hidden' name='id' value='" + producto.id + "'>" +
                        "@if(isset( auth::user()->id))<button type='submit' class='btn btn-outline-success btn-sm'>Añadir al carrito</button>@endif" +
                        "</form>" +
                        "</div>" +
                        "<div class='col d-flex justify-content-center'>" +
                        "<button class='btn btn-outline-primary' onclick='mostrarProducto(" + producto.id + ")'>Ver Producto</button> " +
                        //"<a href='http://127.0.0.1:8000/api/productos/" + producto.id + "' type='button' class='btn btn-outline-warning btn-sm'>Ver producto</a>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                        count++; // Incrementar el contador de productos en la fila
                        if (count % 4 == 0) { // Si ya hay 4 productos en la fila, cerrar la fila
                            productosHTML += "</div>";
                        }
                    });
                    if (count % 4 != 0) { // Si no se cerró la última fila, cerrarla
                        productosHTML += "</div>";
                    }
                    $(".row-cols-1").html(productosHTML);
                }
            });
            
    function mostrarProducto(id) {
        document.getElementById('contenido').style.display = 'none';
            $.ajax({
                url: "http://127.0.0.1:8000/api/productos/" + id,
                method: "GET",
                success: function(data) {
                    // Mostrar la información del producto en la vista
                    var producto = data.data;
                    var productosHTML = "";
                    productosHTML +=
                        "<div class='col'>" +
                        "<div class='card'>" +
                        "<img src='" + producto.image + "' class='card-img-top' alt='...'>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'><a href='/productos/show/" + producto.id + "' class='text-decoration-none'>" + producto.brand + " " + producto.name + "</a></h5>" +
                        "<p class='card-text'>" + producto.description + "</p>" +
                        "<p class='card-text fw-bold'>" + producto.price + "€</p>" +
                        "<div class='row'>" +
                        "<div class='col d-flex justify-content-end'>" +
                        "<form action='/carrito/add' method='post'>" +
                        "<input type='hidden' name='id' value='" + producto.id + "'>" +
                        "@if(isset( auth::user()->id))<button type='submit' class='btn btn-outline-success btn-sm'>Añadir al carrito</button>@endif" +
                        "</form>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                    $(".producto-container").html(productosHTML);
                }
        });
    }

        
    
</script>

@endsection
