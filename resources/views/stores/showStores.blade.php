@extends('plantilla')
@section('content')

<div>    
    <h2>Productos asignados al {{ $store->name }}</h2>
</div>
        
  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="row">

    <div class="col-sm">
     	<form method='POST' action="{{ route('stores.detachproducts',$store->id) }}">
            @csrf
	     	<div class="form-group">
	    	  <label>Productos Asignados</label>
	    	  <select multiple  size="10" name="products[]" class="form-control">
	    			
	    		@foreach($store->products as $sto) {		
	                  <option value="{{ $sto->id }}">
                    {{ $sto->brand }} {{ $sto->name }}                              
                          </option>                         
	                @endforeach
	    			
	    	</select>
	    	</div>
        <br>
	    	<input type="submit" value="Quitar Producto" class="btn btn-dark">
    	</form>
      <a href="/stores/show/{{ $sto-> id }}" class="btn btn-outline-primary mt-3">Ver almacén</a>
    </div>
    <div class="col-sm">
    	<form method='POST' action="{{ route('stores.assignproducts',$store->id) }}">
             @csrf
      		<div class="form-group">
    		<label>Lista de Productos</label>
    		<select multiple class="form-control" size="10" name="products[]">
          
    		  @foreach($products2 as $pro) {        
                    <option value="{{ $pro->id }}">
                    {{ $pro->brand }} {{ $pro->name }}                              
                    </option>                         
                  @endforeach
    		</select>
    		
    		</div>
        <br>
    		<input class="btn btn-dark" value="Asignar Producto" type="submit">
    	</form>
    </div>
  </div>

@endsection