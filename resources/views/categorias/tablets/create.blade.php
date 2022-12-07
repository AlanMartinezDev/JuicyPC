@extends('plantilla')
@section('content')

<h1>Create hero</h1>
<br><a href="/heroes">Veure heroes</a>
<form action="/heroes/save" method="post">
    @csrf
    <br>
    Realname <input type="text" name="realname" value="{{ old('realname') }}"><br><br>
    Heroname <input type="text" name="heroname" value="{{ old('heroname') }}"><br><br>
    Gender <select type="text" name="gender" value="{{ old('gender') }}">
                <option value="male">Male</option>
                <option value="female">Female</option>    
           </select>
    <br><br>
    Planet id <select type="text" name="planet_id" value="{{ old('planet_id') }}">
                    @foreach($planets as $planet)
                        <option value="{{ $planet->id }}">{{ $planet->name }}</option>
                    @endforeach
              </select>
    <br><br>
    <input type="submit" value="Create">
</form>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@endsection