@extends('layouts.app')

@section('content')

<div class="row meye-form">
    <div class="col-12 py-4">
        <form method="POST" action="{{ route('createPj') }}">
            @csrf

            <div class="form-group row justify-content-center">                
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <label class='text-light font-weight-bold' for="nombre">Nombre</label class='text-light font-weight-bold'>
                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="" required autofocus>

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <label class='text-light font-weight-bold' for="tipo">Tipo</label class='text-light font-weight-bold'>
                    <select class="form-control" id="tipo" name="tipo">
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo}}">{{$tipo}}</option>
                        @endforeach                    
                    </select>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <label class='text-light font-weight-bold' for="fortaleza1">Fuerte tipo 1</label class='text-light font-weight-bold'>
                    <select class="form-control" id="fortaleza1" name="fortaleza1">
                        @foreach ($fortaleza1 as $fortaleza)
                            <option value="{{$fortaleza}}">{{$fortaleza}}</option>
                        @endforeach                    
                    </select>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <label class='text-light font-weight-bold' for="fortaleza2">Fuerte tipo 2</label class='text-light font-weight-bold'>
                    <select class="form-control" id="fortaleza2" name="fortaleza2">
                        @foreach ($fortaleza2 as $fortaleza)
                            <option value="{{$fortaleza}}">{{$fortaleza}}</option>
                        @endforeach                    
                    </select>
                </div>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-xs-10 col-sm-8 col-md-6">
                    <label class='text-light font-weight-bold' for="description">Descripción</label class='text-light font-weight-bold'>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-sm-4 col-md-3 ">
                    @csrf
                    <button type="submit" class="btn text-light btn-block meye-btn-blue">
                        {{ __('Crear Pj') }}
                    </button>
                </div>
            </div>
        </form>                    
    </div>
</div>
@endsection