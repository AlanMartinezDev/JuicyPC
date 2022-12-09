@extends('plantilla')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/productos') }}" class="text-decoration-none">Productos</a></h5>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/categorias') }}" class="text-decoration-none">Categorías</a></h5>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/carrito') }}" class="text-decoration-none">Carrito</a></h5>
            </div>
        </div>
    </div>
</div>

@endsection