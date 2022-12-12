@extends('plantilla')
@section('content')

@if(isset( auth::user()->name ) && auth::user()->role == 'admin')
<div class="row">
    <div class="col w-50 d-flex justify-content-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/stores') }}" class="text-decoration-none">Almacenes</a></h5>
            </div>
        </div>
    </div>
</div>
@else
    <script>window.location = "/";</script>
@endif
@endsection