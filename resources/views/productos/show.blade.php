@extends('plantilla')
@section('content')
    <div class="row">
        <div class="row mb-3">
            <h1>Ver producto</h1>
            <!-- If que muestra el número de veces que hemos añadido un producto sumando el 1 de la función add de
                    ShoppingCartController.php-->
            <!--@if(count(Cart::getContent()))
                <a href="/carrito">Ver carrito. {{ count(Cart::getContent()) }} productos en el carrito.</a>
            @endif-->
        </div>
    <div class="col-3"></div>
    @foreach($product->cats as $cat)
    <div class="col-6">
        <div class="card">
            <img src="{{ $product->image }}" class="card-img-top w-50 d-block ms-auto me-auto" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $product->brand }} {{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">Categoría: <a href="/categorias/show/{{ $cat->id }}" class="text-decoration-none">{{ $cat->name }}</a></p>
                <p class="card-text fw-bold"><i class="fa-solid fa-sack-dollar"></i> {{ $product->price }}€</p>
                <div class="row">
                    @if( isset(auth::user()->role) && auth::user()->role == 'admin' )
                        <div class="col d-flex justify-content-center">
                            <a href="/productos/update/{{ $product->id }}" type="button" class="btn btn-outline-warning btn-sm">Editar producto</a>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <a href="/productos/delete/{{ $product->id }}" type="button" class="btn btn-outline-danger btn-sm">Borrar producto</a>
                        </div>
                    @else
                        <div class="col d-flex justify-content-end">
                                <form action="{{ route('carrito.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-success btn-sm">Añadir al carrito</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-3"></div>
</div>
@endsection