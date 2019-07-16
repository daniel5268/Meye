@extends('layouts/app')

@section('content')

<div class="row meye-form">
    <div class="col-12 py-4 align-items-center">
        <form method="POST"  action="{{ route('login') }}">
            @csrf

            <div class="form-group row justify-content-center">                
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="username" placeholder="Usuario" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                    @error('username')
                        <span class="invalid-feedback text-light ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback text-light ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row justify-content-center">                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label text-light" for="remember">
                        {{ __('Recuerdame') }}
                    </label>
                </div>                
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-sm-4 col-md-3 mx-auto mx-sm-0 mb-3 offset-sm-2">
                    <button type="submit" class="btn  text-light btn-block meye-btn-green">
                        {{ __('Ingresar') }}
                    </button>
                </div>
                <div class="col-12 col-sm-4 col-md-3 mx-auto mx-sm-0 mb-3">
                    <button type="button" id="register-button" class="btn text-light btn-block meye-btn-blue">
                        {{ __('Registrarse') }}
                    </button>
                </div>
            </div>
        </form>
        <form method="GET" id="register-form" action="{{ route('register') }}">
            @csrf
        </form>
    </div>
</div>
@endsection
