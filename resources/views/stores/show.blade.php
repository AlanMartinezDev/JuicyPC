@extends('plantilla')
@section('content')
    <h5 class="card-title d-flex justify-content-center">{{ $store->name }}</h5><br>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4">
        @foreach($store->products as $stores)
        <div class="col">
            <div class="card">
                <img src="{{ $stores->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a href="/productos/show/{{ $stores->id }}" class="text-decoration-none">{{ $stores->brand }} {{ $stores->name }}</a></h5>
                    <p class="card-text">{{ $stores->description }}</p>
                    <p class="card-text fw-bold">{{ $stores->price }}€</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a href="/stores" class="btn btn-outline-primary mt-3">Volver al listado de almacenes</a>
@endsection