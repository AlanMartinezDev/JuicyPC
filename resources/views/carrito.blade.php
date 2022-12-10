@extends('plantilla')
@section('content')
    <div class="row">
        <div class="row mb-3">
            <h1>Carrito</h1>
            <!-- If que muestra el número de veces que hemos añadido un producto sumando el 1 de la función add de
                    ShoppingCartController.php-->
            @if(count(Cart::getContent()))
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
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}€</td>
                        <td>{{ $item->quantity }}</td>
                        <td>
                            <form action="{{ route('carrito.removeitem') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <input type="submit" class="btn btn-outline-danger btn-sm" value="Eliminar">
                            </form>
                        </td>
                        <td>{{ $item->price * $item->quantity }}€</td>
                    </tr>
                    @endforeach
                </table>
                <div class="row">Total: {{ \Cart::getSubTotal() }}€</div>
            @else
                <a href="/productos">Carrito vacío. Seguir comprando.</a>
            @endif
        </div>
    </div>
@endsection