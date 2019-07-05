@extends('layouts.app')

@section('content')

<div class="row meye-form m-0 justify-content-center">
    <div class="col-12 py-4 d-flex justify-content-center align-items-center">        
        <div class="col-xs-10 col-sm-8 col-md-6 d-flex justify-content-center align-items-center">
            <select class="form-control text-center" id="pj-select">
                @foreach ($pjs as $key => $pj)
                    <option value="{{$key}}" id="{{$key}}">
                        {{$pj['nombre']}}
                    </option>
                @endforeach                    
            </select>
        </div>        
    </div>
    @foreach ($pjs as $key => $pj)
    <div class="pj-div row justify-content-center justify-content-md-between mb-3" id="{{$key}}">
        <form method="POST" class="d-flex justify-content-center" action="{{ route('managePj') }}">
        @csrf            
            <div class="col-auto d-flex justify-content-center align-items-center">
                <select class="form-control text-center" id="type-select">
                    @foreach ($pj['xpTypes'] as $type)
                        <option value="{{$type}}" id="{{$type}}">
                            {{$type}}
                        </option>
                    @endforeach                    
                </select>
            </div>
            <div class ="input-group  col align-items-center">
                <div class="input-group-prepend">
                    <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                        <strong>-</strong>
                    </button>
                </div>
                <input type="text"  value="0" style="text-align: center" class="form-control bg-light h-100" name="edad">
                <div class="input-group-append">
                    <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                        <strong>+</strong>
                    </button>
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn mx-auto text-light meye-btn-green"> Asignar </button>
            </div>
            
        </form>
    </div>
    <form method="POST" action="{{ route('managePj') }}">
        @csrf
        <input type="hidden" value="{{$key}}" name="id">
        <div class="pj-div row justify-content-center justify-content-md-between" id="{{$key}}">
            <div class="text-center mb-3">
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Edad
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['edad']}}" style="text-align: center" class="form-control bg-light" name="edad">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">                            
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Altura
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['altura']}}" style="text-align: center" class="form-control bg-light" name="altura">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">                            
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Peso
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['peso']}}" style="text-align: center" class="form-control bg-light" name="peso">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">                            
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Tamaño de equipo
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['bolsa']}}" style="text-align: center" class="form-control bg-light" name="bolsa">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">                            
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Locura
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['cordura']}}" style="text-align: center" class="form-control bg-light" name="cordura">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">                            
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Carisma
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['carisma']}}" style="text-align: center" class="form-control bg-light" name="carisma">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">                            
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Villanía
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['villania']}}" style="text-align: center" class="form-control bg-light" name="villania">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Heroismo
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['heroismo']}}" style="text-align: center" class="form-control bg-light" name="heroismo">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mb-3">
                <div class="w-75 meye-label mx-auto  rounded-top">
                    Apariencia
                </div>
                <div class  ="input-group  ">
                    <div class="input-group-prepend">
                        <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                            <strong>-</strong>
                        </button>
                    </div>
                    <input type="text"  value="{{$pj['apariencia']}}" style="text-align: center" class="form-control bg-light" name="apariencia">
                    <div class="input-group-append">
                        <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                            <strong>+</strong>
                        </button>
                    </div>
                </div>
            </div>


            <div class="form-group col-12 mt-2">
                <label class="text-light" for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{$pj['description']}}</textarea>
            </div>
            <div class="form-check mx-auto">
                @if($pj['commerce'])
                    <input class="form-check-input" type="checkbox" checked  name="commerce" id="commerce">
                @else
                    <input class="form-check-input" type="checkbox" name="commerce" id="commerce">
                @endif
                <label class="form-check-label text-light" for="commerce">
                Permitir comercio
                </label>
            </div>
            <div class="col-12 d-flex justify-content-center">
                @csrf
                <button type="submit" class="btn my-3 mx-auto text-light meye-btn-green">
                    {{ __('Guardar') }}
                </button>
            </div>            
        </div>        
    </form>
    @endforeach
</div>
@endsection