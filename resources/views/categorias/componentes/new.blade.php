@extends('plantilla')
@section('content')
    @if( auth::user()->role == 'admin' )
    <div class="row">
        <div class="col-10">
            <div class="row g-3">
                <div class="col-4">
                    <form action="/componentes/save" method="post">
                        @csrf
                        <input type="text" class="form-control mb-2" name="brand" placeholder="Marca" aria-label="Marca">
                        <input type="text" class="form-control mb-2" name="name" placeholder="Nombre" aria-label="Nombre">
                        <input type="text" class="form-control mb-2" name="description" placeholder="Descripción del producto" aria-label="Descripción del producto">
                        <input type="number" class="form-control mb-2" name="price" placeholder="Precio (sin €)" aria-label="Precio">
                        <input type="text" class="form-control mb-2" name="image" placeholder="Imagen (link)" aria-label="Imagen (link)">
                        <button type="submit" class="btn btn-outline-dark">Guardar producto</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-2">
            
        </div>
    </div>
    @else
        <script>window.location = "/componentes";</script>
    @endif
@endsection