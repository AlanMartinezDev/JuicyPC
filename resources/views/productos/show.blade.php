@extends('plantilla')
@section('content')
    @foreach($product->cats as $cat)
    <li>
        {{ $cat->name }} 
    </li>
    <li>
        {{ $product->name }}
    </li>
    @endforeach
@endsection