@extends('plantilla')
@section('content')
    @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
    <div class="row">
        <div class="col-12">
        <div class="row mb-3">
            <h1>Crear producto</h1>
        </div>
            <div class="row g-3">
                <div class="col-6">
                    <form action="{{ route('productos.store') }}" method="post">
                        @csrf
                        <label for="brand" class="form-label">Marca</label>
                        <input type="text" class="form-control mb-2" name="brand" id="brand" aria-label="Marca">

                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control mb-2" name="name" id="name" aria-label="Nombre">

                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control mb-2" name="description" id="description" aria-label="Descripción del producto" rows="3" maxlength="255"></textarea>
                        
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" class="form-control mb-2" name="price" id="price" aria-label="Precio">
                        
                        <label for="image" class="form-label">Imagen (url)</label>
                        <input type="text" class="form-control mb-2" name="image" id="image" aria-label="Imagen (link)">
                        
                        <button type="submit" class="btn btn-outline-dark">Guardar producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
        <script>window.location = "{{ url('/') }}";</script>
    @endif
@endsection