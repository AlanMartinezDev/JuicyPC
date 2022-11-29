@extends('plantilla')
@section('content')
    <div class="row">
        <h1>Mi cuenta</h1>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="row justify-content-center fs-4 fw-bold">DATOS DE LA CUENTA</div>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputName" value="{{ $user->name }}">
                </div>
                <div class="col-md-6">
                    <label for="inputUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="inputUsername" value="{{ $user->username }}">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" value="{{ $user->email }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputState" class="form-label">Region</label>
                    <select id="inputState" class="form-select">
                    <option selected>Choose Region...</option>
                    <option selected>Spain</option>
                    <option selected>Portugal</option>
                    <option selected>Andorra</option>
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
                    <input type="text" class="form-control" id="inputAddress" value="{{ $user->address }}">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword3" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword3">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
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
@endsection