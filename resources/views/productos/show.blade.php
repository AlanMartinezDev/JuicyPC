@extends('plantilla')
@section('content')
    @foreach($product->cats as $cat)
    <li>
        Marca: {{ $product->brand }}
    </li>
    <li>
        Nombre: {{ $product->name }}
    </li>
    <li>
        Descripción: {{ $product->description }}
    </li>
    <li>
        Precio: {{ $product->price }}
    </li>
    <li>
        Imagen: <img src="{{ $product->image }}" class="w-25" alt="">
    </li>
    <li>
        Categoría: {{ $cat->name }} 
    </li>
    @endforeach
@endsection