@extends('plantilla')
@section('content')

<div class="row text-start">
    <p><strong>Expertos en tecnología</strong> con un servicio 5 ☆</p>
</div>
<div class="row mb-3">
    <div class="col-12">
        <a href="/categorias/show/2"><img src="https://img.pccomponentes.com/pcblog/1672873200000/1560x349-1-1.jpg" class="img-fluid rounded" alt="PC"></a>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/productos') }}" class="text-decoration-none">Explorar productos</a></h5>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex justify-content-center"><a href="{{ url('/categorias') }}" class="text-decoration-none">Ver categorías</a></h5>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <a href="{{ url('/productos') }}"><img src="{{ url('images/pc1.webp') }}" class="img-fluid rounded" alt="PC1"></a>
    </div>
    <div class="col-3">
        <a href="{{ url('/productos') }}"><img src="{{ url('images/pc2.webp') }}" class="img-fluid rounded" alt="PC2"></a>
    </div>
    <div class="col-3">
        <a href="{{ url('/productos') }}"><img src="{{ url('images/pc3.webp') }}" class="img-fluid rounded" alt="PC3"></a>
    </div>
    <div class="col-3">
        <a href="{{ url('/productos') }}"><img src="{{ url('images/pc4.webp') }}" class="img-fluid rounded" alt="PC4"></a>
    </div>
</div>

@endsection