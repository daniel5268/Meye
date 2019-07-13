@extends('layouts.app')

@section('content')

<div class="row meye-form">
    <div class="col-12 py-4">
        <form method="POST" action="{{ route('passwordUpdate') }}">
            @csrf

            <div class="form-group row justify-content-center">                
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="current_password" placeholder="Contraseña actual" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="" required autofocus>

                    @error('current_password')
                        <span class="invalid-feedback text-light ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="new_password" placeholder="Contraseña nueva" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                    @error('new_password')
                        <span class="invalid-feedback text-light ml-2" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <input id="new_password_confirm" placeholder="Confirmar contraseña" type="password" class="form-control" name="new_password_confirmation" required >
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col col-sm-8 col-md-4 ">
                    @csrf
                    <button type="submit" class="btn text-light btn-block meye-btn-green">
                        {{ __('Cambiar contraseña') }}
                    </button>
                </div>
            </div>
        </form>                    
    </div>
</div>
@endsection