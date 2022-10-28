@extends('plantilla')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Mi cuenta</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <h2>Tiki Tiki</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet nemo sed quas aspernatur officia ipsam magnam quisquam, voluptates similique assumenda veniam harum quos asperiores perspiciatis numquam, at est animi. Repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem minima voluptatem excepturi dolor a. Facere dignissimos veritatis accusamus hic animi, corporis tenetur quas. Quaerat totam iusto nam quibusdam molestiae!<p>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet nemo sed quas aspernatur officia ipsam magnam quisquam, voluptates similique assumenda veniam harum quos asperiores perspiciatis numquam, at est animi. Repellendus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus rem minima voluptatem excepturi dolor a. Facere dignissimos veritatis accusamus hic animi, corporis tenetur quas. Quaerat totam iusto nam quibusdam molestiae!<p>
        </div>
        <div class="col-4">
            <h2>Iniciar sesión</h2>
            <form action="/login" method="POST">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="E-mail" required>
                    <label for="inputEmail">E-mail</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Contraseña" required>
                    <label for="inputPassword">Contraseña</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="submit" class="btn btn-primary" name="login" value="Iniciar sesión">
                </div>
                <div class="form-floating">
                    <p>¿No tienes cuenta?</p>
                    <!--
                        <input type="submit" class="btn btn-outline-secondary" name="register" value="Regístrate">
                    -->
                    <a href="/registro" type="button" class="btn btn-outline-secondary">Regístrate</a>
                </div>
            </form>
        </div>
    </div>
@endsection