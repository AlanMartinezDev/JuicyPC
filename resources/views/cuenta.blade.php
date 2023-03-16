@extends('plantilla')
@section('content')
    <div class="row">
        <h1>Cuenta</h1>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-5 col-xxl-5 mt-5">
            <div class="row justify-content-center fs-4 mb-4">Datos de tu cuenta</div>
            <form class="row g-3" id="edit-form">
                <div class="col-md-6">
                    <input class="form-control" type="text" name="name" placeholder="Nombre">
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="password" name="password" placeholder="Contraseña">
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="username" placeholder="Nombre de usuario">
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="address" placeholder="Dirección">
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="number" name="accountBalance" placeholder="Saldo de cuenta">
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="text" name="shippingRegion" placeholder="Región de envío">
                </div>
                <div class="col-md-6">
                    <input class="btn btn-outline-success" type="submit" value="Guardar">
                </div>  
            </form>
            <script>
                $('#edit-form').on('submit', function(event) {
                    event.preventDefault();
                    var formData = $(this).serialize();

                    $.ajax({
                        url: "",
                        type: "PUT",
                        data: formData,
                        success: function(data) {
                            // actualizar la vista con los nuevos datos del usuario
                            console.log(data);
                        }
                    });
                });
            </script>
             </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 col-xxl-4 mt-5">
            <div class="row justify-content-center fs-4 mb-4">Mis pedidos</div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pedido1" aria-expanded="false" aria-controls="pedido1">
                        Pedido #1
                    </button>
                    </h2>
                    <div id="pedido1" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Datos del pedido #1
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 col-xxl-3 mt-5">
            <form action="/cuenta2/{{ $user->id }}" method="post" class="needs-validation" novalidate>
            @csrf
                <div class="row fs-4 justify-content-center mb-3">Saldo</div>
                    <div class="input-group mb-3 justify-content-center">
                        <span class="input-group-text">Saldo de la cuenta:</span>
                        <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip" data-bs-title="Añade saldo en el campo inferior." style="cursor:not-allowed;">{{ $user->accountBalance}}$</span>
                    </div>
                    <!--IMPLEMENTAR FORMULARIO PARA AÑADIR BALANCE A LA CUENTA-->
                    <div class="row g-0 justify-content-center text-center">
                        <div>
                            <label for="accountBalance" class="form-label">Añade saldo a tu cuenta</label>
                        </div>
                        <div class="col-8 mb-3">
                            <input type="number" class="form-control" id="accountBalance" name="accountBalance" value="0" min="0" max="10000">
                            <div class="invalid-feedback">
                                El saldo a añadir no puede ser menor que 0 ni mayor que 10000.
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-outline-primary">Actualizar saldo</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        // tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

        // validación formulario
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
@endsection