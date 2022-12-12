@extends('plantilla')
@section('content')

<div class="row text-start">
        <p><strong>Expertos en tecnología</strong> con un servicio 5 ☆</p>
    </div>
    <div class="row">
        <div class="col-16">
            <a href="/productos"><img src="https://img.pccomponentes.com/pcblog/1670540400000/1560x349-1.jpg" class="img-fluid" alt="PC"></a>
        </div>
    </div>
    <br>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/productos') }}" class="text-decoration-none">EXPLORA PRODUCTOS</a></h5>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/categorias') }}" class="text-decoration-none">VER CATEGORÍAS</a></h5>

            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-22 d-flex justify-content-center">
        <a href="/productos"><img src="https://img.pccomponentes.com/pcblog/1670194800000/navidad-adviento-1560x380.jpg" class="img-fluid" alt="PC"></a>
    </div>
</div>
    <br>
<div class="row">
    <div class="col-22 d-flex justify-content-center">
        <a href="/productos"><img src="https://img.pccomponentes.com/pcblog/1669762800000/1030x420-header-navidad-02-1.jpg" class="img-fluid" alt="PC"></a>
    </div>
</div>

@endsection