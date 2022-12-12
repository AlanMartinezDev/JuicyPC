@extends('plantilla')
@section('content')
    <div class="row">
        <h1>Cuenta</h1>
    </div>

    <div class="row">
        <div class="col-5">
            <div class="row justify-content-center fs-4">Datos de tu cuenta</div><br>
            <form class="row g-3" action="/cuenta/{{ $user->id }}" method="post">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-md-6">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" value="{{ $user->username }}">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" value="{{ $user->email }}" title="Tu email no es modificable una vez creada la cuenta" style="cursor:not-allowed;" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Región</label>
                    <select id="inputState" class="form-select" name="shippingRegion">
                    @if($user->shippingRegion == 'España')
                        <option>Escoge una región...</option>
                        <option selected>España</option>
                        <option>Portugal</option>
                        <option>Andorra</option>
                    @elseif ($user->shippingRegion == 'Portugal')
                        <option>Escoge una región...</option>
                        <option>España</option>
                        <option selected>Portugal</option>
                        <option>Andorra</option>
                    @elseif ($user->shippingRegion == 'Andorra')
                        <option>Escoge una región...</option>
                        <option>España</option>
                        <option>Portugal</option>
                        <option selected>Andorra</option>
                    @else
                        <option selected>Escoge una región...</option>
                        <option>España</option>
                        <option>Portugal</option>
                        <option>Andorra</option>
                    @endif
                    </select>
                </div>
                <!--
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                -->
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Dirección de envío</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" value="{{ $user->address }}">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Nueva contraseña</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword3" class="form-label">Confirmar nueva contraseña</label>
                    <input type="password" class="form-control" id="inputPassword3" name="cpassword">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-outline-primary me-3">Actualizar datos</button>
                    <!-- Modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar cuenta</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">¿Quieres eliminar tu cuenta?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Sentimos que te vayas, esta acción no es reversible y recuerda que cualquier problema puedes solucionarlo en el <a href="/centro-de-ayuda">centro de ayuda</a>.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="/eliminarCuenta/{{ $user->id }}" type="submit" class="btn btn-outline-danger">Eliminar cuenta</a>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- Fin de modal -->
                </div>
                @csrf
            </form>
        </div>
        <div class="col-4"></div>
        <div class="col-3 align-self-center">
            <form action="/cuenta2/{{ $user->id }}" method="post">
            <div class="row fs-4 justify-content-center mb-3">Saldo</div>
                <div class="input-group mb-3 justify-content-center">
                    <span class="input-group-text">Saldo de la cuenta:</span>
                    <span class="input-group-text" title="Añade saldo en el campo inferior" style="cursor:not-allowed;">{{ $user->accountBalance}}$</span>
                </div>
                <!--IMPLEMENTAR FORMULARIO PARA AÑADIR BALANCE A LA CUENTA-->
                <div class="row g-0 justify-content-center text-center">
                    <div>
                        <label for="accountBalance" class="form-label">Añade saldo a tu cuenta</label>
                    </div>
                    <div class="col-6 col-md-4 mb-3">
                        <input type="number" class="form-control" id="accountBalance" name="accountBalance" value="0" min="0" max="10000">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-outline-primary">Actualizar saldo</button>
                    </div>
                </div>
            </div>
            @csrf
            </form>
        </div>
    <!--
    <div class="row ">
        <div class="col">
            <div class="row justify-content-center">Mis datos</div>
            <div class="row justify-content-center">

            <label for="email" class="col col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
-->
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
@endsection