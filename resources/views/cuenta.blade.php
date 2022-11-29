@extends('plantilla')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Mi cuenta</h1>
            <p>Bienvenido {{ Auth::user()->name }}</p>
            <button type="submit" class="btn btn-outline-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </button>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
@endsection