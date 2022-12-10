@extends('plantilla')
@section('content')
    <div class="row">
        <div class="row mb-3">
            <h1>Pedidos</h1>
        </div>
        <div class="col">
        <div class="row mb-3 justify-content-center">
            @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                <div class="col-2">
                    <a href="{{ route('orders.create') }}" type="button" class="btn btn-outline-dark">Añadir pedido</a>
                </div>
            @endif
        </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4 g-4">
                @foreach($orders as $order)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $order->user_id }}</h5>

                            <div class="row">

                                <div class="col d-flex justify-content-center">
                                    <a href="/orders/show/{{ $order->id }}" type="button" class="btn btn-outline-warning btn-sm">Ver producto</a>
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