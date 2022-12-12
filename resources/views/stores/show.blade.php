@extends('plantilla')
@section('content')
<h5 class="card-title d-flex justify-content-center">{{ $store->name }}</h5><br>
    @foreach($store->products as $stores)
    <br><br>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <p class="card-text">Nombre: {{ $stores->brand }} {{ $stores->name }}</p>
                <p class="card-text">Precio: {{ $stores->price }}€</p>
                <img src="{{ $stores->image }}" class="card-img-top w-50 d-block ms-auto me-auto" alt="...">
            </div>
        </div>
    </div>
</div>
    @endforeach

    <a href="/stores/" class="btn btn-outline-primary mt-3">Volver al listado de almacenes</a>
@endsection