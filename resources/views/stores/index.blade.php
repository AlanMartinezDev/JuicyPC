@extends('plantilla')
@section('content')
    <div class="row">
        <div class="row mb-3">
            <h1>Almacenes</h1>
        </div>
        <div class="col">
        <div class="row mb-3 justify-content-center">
            @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                <div class="col-2">
                    <a href="{{ route('stores.create') }}" type="button" class="btn btn-outline-dark">Crear almacen</a>
                </div>
            @endif
        </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4">
                @foreach($stores as $store)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $store->name }}</h5>
                            <p class="card-text">{{ $store->address }}</p>
                            <p class="card-text fw-bold">{{ $store->contact }}</p>
                            <div class="row">
                                @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                                    <div class="col d-flex justify-content-center">
                                        <a href="/stores/update/{{ $store->id }}" type="button" class="btn btn-outline-warning btn-sm">Editar producto</a>
                                    </div>
                                    <div class="col d-flex justify-content-center">
                                        <a href="/stores/delete/{{ $store->id }}" type="button" class="btn btn-outline-danger btn-sm">Borrar producto</a>
                                    </div>
                                @else
                                    
                                    <div class="col d-flex justify-content-center">
                                        <a href="/stores/show/{{ $store->id }}" type="button" class="btn btn-outline-warning btn-sm">Ver producto</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col justify-content-center d-flex">
            {{ $stores->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection