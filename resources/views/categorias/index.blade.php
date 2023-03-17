@extends('plantilla')
@section('content')


<!-- ---------------------------------------------------------------------------------------------- -->
<div class="row row-cols-1" id="contenido">
    <div class="col">
        
    </div>
</div>

<div class="container">
  <div class="row producto-container">
    <!-- La información del producto se agregará aquí -->
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
        $.ajax({
                url: "http://127.0.0.1:8000/api/categorias",
                method: "GET",
                success: function(data) {
                    // Agregar los productos a la vista
                    var categoriasHTML = "";
                    var count = 0; // Contador para productos en cada fila
                    $.each(data.data, function(index, categoria) {
                        if (count % 4 == 0) { // Si ya hay 4 productos en la fila, cerrar y abrir una nueva fila
                            categoriasHTML += "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4'>";
                        }
                        categoriasHTML +=
                        "<div class='col'>" +
                        "<div class='card'>" +
                        "<img src='" + categoria.image + "' class='card-img-top' alt='...'>" +
                        "<div class='card-body'>" +
                        "<h5 class='card-title'><a href='/categorias/show/" + categoria.id + "' class='text-decoration-none'>"  + categoria.name + "</a></h5>" +
                        "<div class='row'>" +
                        "<div class='col d-flex justify-content-end'>" +
                        "<button class='btn btn-outline-primary' onclick='mostrarCategoria(" + categoria.id + ")'>Ver productos</button> " +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>";
                        count++; // Incrementar el contador de productos en la fila
                        if (count % 4 == 0) { // Si ya hay 4 productos en la fila, cerrar la fila
                            categoriasHTML += "</div>";
                        }
                    });
                    if (count % 4 != 0) { // Si no se cerró la última fila, cerrarla
                        categoriasHTML += "</div>";
                    }
                    $(".row-cols-1").html(categoriasHTML);
                }
            });
                                                                                                                                                                                       
        //Pillamos la id por parametro en el botón
        function mostrarCategoria(categoria) {
            window.location.href = "/categorias/show/" + categoria;
        }
</script>

@endsection

