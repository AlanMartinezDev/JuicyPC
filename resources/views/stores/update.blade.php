@extends('plantilla')
@section('content')
    @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
    <div class="row">
        <div class="col-10">
            <div class="row g-3">
                <div class="col-6">
                    <form action="/stores/update/{{ $stores->id }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control mb-2" name="name" id="name" value="{{ $stores->name }}" aria-label="Nombre">

                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control mb-2" name="address" id="address" value="{{ $stores->address }}" aria-label="Dirección">

                        <label for="contact" class="form-label">Contacto</label>
                        <input type="text" class="form-control mb-2" name="contact" id="contact" value="{{ $stores->contact }}" aria-label="Contacto">
                        <p class="card-text fw-bold"><i class="fa-solid fa-circle-user"></i> {{ $stores->user->username }}</p>

                        <button type="submit" class="btn btn-outline-dark">Actualizar Store</button>
                    </form>
                    <br>
                        <a href="/stores/{{$stores->id }}/stores" type="button" class="btn btn-outline-warning btn-sm">Asignacion de Productos</a>
                </div>
            </div>
        </div>
    </div>
    @else
        <!-- Si no estas logeado como admin te volverá a mandar a la página principal -->
        <script>window.location = "{{ url('/stores') }}";</script>
    @endif
@endsection
