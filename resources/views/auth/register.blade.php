@extends('layouts.app')

@section('content')

<div class="row meye-form">
    <div class="col-12 py-4">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row justify-content-center">                
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="username" placeholder="Usuario" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="password-confirm" placeholder="Confirmar contraseña" type="password" class="form-control" name="password_confirmation" required >
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col col-sm-4 col-md-3 ">
                    @csrf
                    <button type="submit" class="btn text-light btn-block meye-btn-green">
                        {{ __('Registrarse') }}
                    </button>
                </div>
            </div>
        </form>                    
    </div>
</div>
@endsection