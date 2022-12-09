@extends('plantilla')
@section('content')
    @foreach($cats->products as $product)
    <li>
        Marca: {{ $product->brand }}
    </li>
    @endforeach
@endsection