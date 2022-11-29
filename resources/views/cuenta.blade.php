@extends('plantilla')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Mi cuenta</h1>
        </div>
        <p>Bienvenido {{ Auth::user()->name }}</p>
        <div class="" aria-labelledby="navbarDropdown">
            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
</div>
    </div>
@endsection