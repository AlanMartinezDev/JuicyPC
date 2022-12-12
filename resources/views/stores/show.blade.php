@extends('plantilla')
@section('content')
    @foreach($store->products as $stores)
    <li>
        Nombre: {{ $stores->name }}
    </li>
    <li>
        Dirección: {{ $stores->address }}
    </li>
    <li>
        Contacto: {{ $stores->contact }}
    </li>
    @endforeach

    <a href="/stores/" class="btn btn-outline-primary mt-3">Volver al listado de almacenes</a>
@endsection