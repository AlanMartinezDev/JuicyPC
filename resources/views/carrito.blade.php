@extends('plantilla')
@section('content')
@if(isset( auth::user()->name ))
    <div class="row">
        <div class="row mb-3">
            <h1>Carrito</h1>
            <!-- If que muestra el número de veces que hemos añadido un producto sumando el 1 de la función add de
                    ShoppingCartController.php-->                
            @if(Cart::isEmpty())
                <div class="col-4"></div>
                <div class="col-4 d-flex justify-content-center">
                    <a href="/productos" type="button" class="btn btn-outline-primary btn-sm">Carrito vacío. Seguir comprando.</a>
                </div>
                <div class="col-4"></div>
            @elseif(count(Cart::getContent()))
            <table class="table table-striped">
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                        <td>Cantidad</td>
                        <td>Opciones</td>
                        <td>Subtotal</td>
                    </tr>

                    @foreach(Cart::getContent() as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="/productos/show/{{ $item->id }}">{{ $item->name }}</a></td>
                        <td>{{ $item->price }}€</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <div class="row">
                                <div class="col-2 d-flex justify-content-end">
                                    <form action="{{ route('carrito.additem') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="hidden" name="quantity" value="{{ $item->quantity }}">
                                    <input type="submit" class="btn btn-outline-primary btn-sm" value="+">
                                    </form>
                                </div>
                                <div class="col-2 d-flex justify-content-center">
                                    <form action="{{ route('carrito.subtractitem') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="submit" class="btn btn-outline-warning btn-sm" value="-">
                                    </form>
                                </div>
                                <div class="col-2 d-flex justify-content-start">
                                    <form action="{{ route('carrito.removeitem') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <input type="submit" class="btn btn-outline-danger btn-sm" value="Eliminar">
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>{{ $item->price * $item->quantity }}€</td>
                    </tr>
                    @endforeach
                </table>
                <div class="row">
                    <div class="col d-flex align-self-center">
                        Total: {{ \Cart::getSubTotal() }}€
                    </div>
                    <div class="col d-flex justify-content-end">
                        <form action="/carrito/{{ $user->id }}" method="post" class="mt-3">
                            @csrf
                            <input type="hidden" name="accountBalance" value="{{ \Cart::getSubTotal() }}" id="accountBalance">
                            <input type="submit" class="btn btn-outline-success btn-sm" value="Comprar">
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @else
        <script>window.location = "/cuenta";</script>
    @endif
@endsection