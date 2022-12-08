@extends('plantilla')
@section('content')
@if( isset(auth::user()->role) && auth::user()->role == 'admin' )
    <div></div>
@else
    <script>window.location = "/";</script>
@endif
@endsection