@extends('plantilla')
@section('content')
    <div class="row">
        <div class="row mb-3">
            <h1>Componentes</h1>
        </div>
        <div class="col-10">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4">
                @foreach($components as $component)
                <div class="col">
                    <div class="card">
                        <img src="https://thumb.pccomponentes.com/w-530-530/articles/82/825624/1666-asus-tuf-gaming-b550-plus-wifi-ii.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $component->brand }} - {{ $component->name }}</h5>
                            <p class="card-text">{{ $component->description }}</p>
                            <p class="card-text">{{ $component->price }}€</p>
                            <div class="row">
                                @if( auth::user()->role == 'admin' )
                                    <div class="col">
                                        <a href="/componentes/update/{{ $component->id }}" type="button" class="btn btn-outline-warning btn-sm">Editar producto</a>
                                    </div>
                                    <div class="col">
                                        <a href="/componentes/delete/{{ $component->id }}" type="button" class="btn btn-outline-danger btn-sm">Borrar producto</a>
                                    </div>
                                @else
                                    <div class="col">
                                        <a href="" type="button" class="btn btn-outline-success btn-sm">Añadir al carrito</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @if( auth::user()->role == 'admin' )
        <div class="col-2">
            <a href="/componentes/new" type="button" class="btn btn-outline-dark">Crear producto</a>
        </div>
        @endif
    </div>
@endsection