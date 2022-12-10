@extends('plantilla')
@section('content')
    <div class="row">
        <div class="row mb-3">
            <h1>Categorías</h1>
        </div>
        <div class="col">
        <div class="row mb-3 justify-content-center">
        @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                <div class="col-2">
                    <a href="{{ route('cat.create') }}" type="button" class="btn btn-outline-dark">Crear Categoria</a>
                </div>
            @endif
        </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4">
                @foreach($cats as $cat)
                <div class="col">
                    <div class="card text-center">
                        <img src="{{ $cat->image }}" class="card-img-top w-75 d-block ms-auto me-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-center"><a href="/categorias/show/{{ $cat->id }}" class="text-decoration-none">{{ $cat->name }}</a></h5>
                            <div class="row">
                            <div class="row">
                                <!--@if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                                    <div class="col d-flex justify-content-center">
                                        <a href="/productos/update/{{ $cat->id }}" type="button" class="btn btn-outline-warning btn-sm">Editar producto</a>
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <a href="/productos/delete/{{ $cat->id }}" type="button" class="btn btn-outline-danger btn-sm">Borrar producto</a>
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <a href="/productos/show/{{ $cat->id }}" type="button" class="btn btn-outline-success btn-sm">Ver producto</a>
                                    </div>
                                @else
                                    <div class="col d-flex justify-content-end">
                                        <a href="" type="button" class="btn btn-outline-success btn-sm">Añadir al carrito</a>
                                    </div>
                                @endif-->
                                @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                                    <div class="col d-flex justify-content-center">
                                        <a href="/categorias/update/{{ $cat->id }}" type="button" class="btn btn-outline-warning btn-sm">Editar producto</a>
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <a href="/categorias/delete/{{ $cat->id }}" type="button" class="btn btn-outline-danger btn-sm">Borrar producto</a>
                                    </div>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection