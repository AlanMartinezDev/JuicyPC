@extends('plantilla')
@section('content')

<div>    
    <h2>Categories of {{ $product->name }}</h2>
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
     	<form method='POST' action="{{ route('products.detachcats',$product->id) }}">
            @csrf
	     	<div class="form-group">
	    	  <label>Categorias Asignadas</label>
	    	  <select multiple  size="10" name="cats[]" class="form-control">
	    			
	    		@foreach($product->cats as $cats) {		
	                  <option value="{{ $cats->id }}">
                            {{ $cats->name }}                              
                          </option>                         
	                @endforeach
	    			
	    	</select>
	    	</div>
        <br>
	    	<input type="submit" value="Quitar Categoria" class="btn btn-dark">
    	</form>

    </div>
    <div class="col-sm">
    	<form method='POST' action="{{ route('products.assigncats',$product->id) }}">
             @csrf
      		<div class="form-group">
    		<label>Lista de Categorias</label>
    		<select multiple class="form-control" size="10" name="cats[]">
          
    		  @foreach($cats2 as $cat) {        
                    <option value="{{ $cat->id }}">
                      {{ $cat->name }}                              
                    </option>                         
                  @endforeach
    		</select>
    		
    		</div>
        <br>
    		<input class="btn btn-dark" value="Asignar Categoria" type="submit">
    	</form>
    </div>
    
  </div>

@endsection