@extends('plantilla')
  
@section('content')
<h2> Fitxa Superheroi</h2>
              
<div>
        
    <div>
        <strong>Hero name:</strong>
        {{ $hero->heroname }}
    </div>
        
    <div>            
       <strong>Real name:</strong>
       {{ $hero->realname }}
    </div>
    <div>
        <strong>Gender:</strong>
        {{ $hero->gender }}
    </div>
        
    <div>
        <strong>Planet:</strong>
        {{ $hero->planet->name }}
    </div>
        
    <div>
        <strong>Powers:</strong>
        <ul>
        @foreach($hero->superpowers as $power)
            <li>
            {{ $power->description }} 
            </li>
        @endforeach
        </ul>
    </div>
        
@endsection