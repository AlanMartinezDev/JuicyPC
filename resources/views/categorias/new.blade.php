@extends('plantilla')
@section('content')
    @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
    <div class="row">
        <div class="col-10">
            <div class="row g-3">
                <div class="col-4">
                    <form action="{{ route('cat.store') }}" method="post">
                        @csrf

                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control mb-2" name="name" id="name" aria-label="Nombre">
                        
                        <label for="image" class="form-label">Imagen (url)</label>
                        <input type="text" class="form-control mb-2" name="image" id="image" aria-label="Imagen (link)">
                        
                        <button type="submit" class="btn btn-outline-dark">Guardar Categoria</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @else
        <script>window.location = "{{ url('/') }}";</script>
    @endif
@endsection