@extends('plantilla')
@section('content')
    <div class="row">
        <h1>Cuenta</h1>
    </div>
    <div class="row">
        <form action="#">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" required>
                <label for="floatingInput">E-mail*</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" required>
                <label for="floatingPassword">Contraseña*</label>
            </div>
            <div class="form-floating mb-3">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
            <div class="form-floating mb-3">
                <p>¿No tienes cuenta?</p>
            </div>
        </form>
        <div class="form-floating">
            <a href="/crear-cuenta" class="btn btn-outline-primary">Crear cuenta</a>
        </div>
    </div>
@endsection