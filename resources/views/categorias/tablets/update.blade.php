@extends('plantilla')
@section('content')

<h1>Update hero</h1>
<br><a href="/heroes">Veure poders</a>
<form action="/heroes/update/{{ $hero->id }}" method="post">
    @csrf
    <br>
    Realname <input type="text" name="realname" value="{{ $hero->realname }}"><br><br>
    Heroname <input type="text" name="heroname" value="{{ $hero->heroname }}"><br><br>
    Gender <select type="text" name="gender" value="{{ $hero->gender }}">
                <option value="male">Male</option>
                <option value="female">Female</option>    
           </select>
    <br><br>
    Planet id <select type="text" name="planet_id" value="{{ $hero->planet_id }}">
                    @foreach($planets as $planet)
                        <option value="{{ $planet->id }}">{{ $planet->name }}</option>
                    @endforeach
              </select>
    <br><br>
    <input type="submit" value="Update">
</form>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection