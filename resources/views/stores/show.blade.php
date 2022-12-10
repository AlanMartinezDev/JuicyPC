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
@endsection