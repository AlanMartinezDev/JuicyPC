@extends('plantilla')
@section('content')
    @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
    <div class="row">
        <div class="col-10">
            <div class="row g-3">
                <div class="col-4">
                    <form action="{{ route('stores.store') }}" method="post">
                        @csrf
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control mb-2" name="name" id="name" aria-label="Nombre">

                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control mb-2" name="address" id="address" aria-label="Dirección">

                        <label for="contact" class="form-label">Contacto</label>
                        <input type="text" class="form-control mb-2" name="contact" id="contact" aria-label="Contacto">
                        
                        <button type="submit" class="btn btn-outline-dark">Guardar almacén</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
        <!-- Si no estas logeado como admin te volverá a mandar a la página principal -->
        <script>window.location = "{{ url('/') }}";</script>
    @endif
@endsection