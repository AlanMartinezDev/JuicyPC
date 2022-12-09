@extends('plantilla')
@section('content')
    <div class="row mb-3">
        <h1>{{ $cats->name }}</h1>
    </div>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4"> 
    @foreach($cats->products as $product)
        <div class="col">
            <div class="card">
                <img src="{{ $product->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->brand }} {{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text fw-bold">{{ $product->price }}€</p>
                    <div class="row">
                        @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                            <div class="col d-flex justify-content-center">
                                <a href="/productos/update/{{ $product->id }}" type="button" class="btn btn-outline-warning btn-sm">Editar producto</a>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <a href="/productos/delete/{{ $product->id }}" type="button" class="btn btn-outline-danger btn-sm">Borrar producto</a>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <a href="/productos/show/{{ $product->id }}" type="button" class="btn btn-outline-success btn-sm">Ver producto</a>
                            </div>
                        @else
                            <div class="col d-flex justify-content-end">
                                <a href="" type="button" class="btn btn-outline-success btn-sm">Añadir al carrito</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection