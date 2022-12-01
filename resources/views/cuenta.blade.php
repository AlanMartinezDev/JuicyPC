@extends('plantilla')
@section('content')
    <div class="row">
        <h1>Mi cuenta</h1>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="row justify-content-center fs-4 fw-bold">DATOS DE LA CUENTA</div>
            <form class="row g-3" action="/cuenta/{{ $user->id }}" method="post">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-md-6">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="inputUsername" name="username" value="{{ $user->username }}">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" value="{{ $user->email }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Region</label>
                    <select id="inputState" class="form-select" name="shippingRegion">
                    @if($user->shippingRegion == 'Spain')
                        <option>Choose Region...</option>
                        <option selected>Spain</option>
                        <option>Portugal</option>
                        <option>Andorra</option>
                    @elseif ($user->shippingRegion == 'Portugal')
                        <option>Choose Region...</option>
                        <option>Spain</option>
                        <option selected>Portugal</option>
                        <option>Andorra</option>
                    @elseif ($user->shippingRegion == 'Andorra')
                        <option>Choose Region...</option>
                        <option>Spain</option>
                        <option>Portugal</option>
                        <option selected>Andorra</option>
                    @else
                        <option selected>Choose Region...</option>
                        <option>Spain</option>
                        <option>Portugal</option>
                        <option>Andorra</option>
                    @endif
                    </select>
                </div>
                <!--
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                -->
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Address</label>
                    <input type="text" class="form-control" id="inputAddress" name="address" value="{{ $user->address }}">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword3" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword3" name="cpassword">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                @csrf
            </form>
            
        </div>
        <div class="col-4">
            <div class="row justify-content-center fs-4 fw-bold">SALDO</div>
        </div>
    </div>
    <!--
    <div class="row ">
        <div class="col">
            <div class="row justify-content-center">Mis datos</div>
            <div class="row justify-content-center">

            <label for="email" class="col col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
-->
@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
@endsection