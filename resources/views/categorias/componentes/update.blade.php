@extends('plantilla')
@section('content')
    @if( auth::user()->role == 'admin' )
    <div class="row">
        <div class="col-10">
            <div class="row g-3">
                <div class="col-4">
                    <form action="/componentes/update/{{ $components->id }}" method="post">
                        @csrf
                        <input type="text" class="form-control mb-2" name="brand" value="{{ $components->brand }}" aria-label="Marca">
                        <input type="text" class="form-control mb-2" name="name" value="{{ $components->name }}" aria-label="Nombre">
                        <input type="text" class="form-control mb-2" name="description" value="{{ $components->description }}" aria-label="Descripción del producto">
                        <input type="number" class="form-control mb-2" name="price" value="{{ $components->price }}" aria-label="Precio">
                        <input type="text" class="form-control mb-2" name="image" value="{{ $components->image }}" aria-label="Imagen (link)">
                        <button type="submit" class="btn btn-outline-dark">Actualizar producto</button>
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