@extends('plantilla')
@section('content')
    @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
    <div class="row">
        <div class="col-10">
            <div class="row g-3">
                <div class="col-6">
                    <form action="/categorias/update/{{ $cats->id }}" method="post">
                        @csrf
                        

                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control mb-2" name="name" id="name" value="{{ $cats->name }}" aria-label="Nombre">
                        
                        <label for="image" class="form-label">Imagen (url)</label>
                        <input type="text" class="form-control mb-2" name="image" id="image" value="{{ $cats->image }}" aria-label="Imagen (link)">
                        <p class="card-text fw-bold"><i class="fa-solid fa-circle-user"></i> {{ $cats->user->username }}</p>

                        <button type="submit" class="btn btn-outline-dark">Actualizar Categoria</button>
                        <br>
                        <a href="/categorias" class="btn btn-outline-primary mt-3">Ver categorias</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
        <script>window.location = "{{ url('/categorias') }}";</script>
    @endif
@endsection
