@extends('plantilla')
@section('content')



<div class="row row-cols-1" id="contenido">
    <div class="col">
        
    </div>
</div>
<div class="row row-cols-1 showcontent">
    
</div>


 

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
                        "<div class='col-6 mx-auto'>" +
                        "<h2 class='text-center'>" + producto.brand + " " + producto.name + "</h2>" +
                        "<img src='" + producto.image + "' class='img-fluid' alt='...'>" +
                        "<p>" + producto.description + "</p>" +
                        "<p class='fw-bold'>" + producto.price + "€</p>" +
                        "<div class='d-flex justify-content-end'>" +
                        "<form action='/carrito/add' method='post'>" +
                        "<input type='hidden' name='id' value='" + producto.id + "'>" +
                        "@if(isset( auth::user()->id))<button type='submit' class='btn btn-outline-success btn-sm'>Añadir al carrito</button>@endif" +
                        "</form>" +
                        "</div>" +
                        "</div>";
                    $(".showcontent").html(productosHTML);
                    }
                });
            }


        
    
</script>

@endsection
