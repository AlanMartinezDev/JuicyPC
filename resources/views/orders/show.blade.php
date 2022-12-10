@extends('plantilla')
@section('content')
    @foreach($order->products as $orders)
    <li>
        ID: {{ $orders->user_id }}
    </li>
    @endforeach
@endsection