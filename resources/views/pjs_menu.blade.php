@extends('layouts.app')

@section('content')

<div class="row meye-form m-0 justify-content-center">
    <div class="col-12 py-4 d-flex justify-content-center align-items-center">        
        <div class="col-xs-10 col-sm-8 col-md-6 d-flex justify-content-center align-items-center">
            <select class="form-control text-center" id="pj-select">
                @foreach ($pjs as $key => $pj)
                    <option value="{{$key}}" id="{{$key}}"
                        @if(Session::get('last')==$key)
                            selected="" 
                        @endif
                    >
                        {{$pj['nombre']}}
                    </option>
                @endforeach
            </select>
        </div>        
    </div>
    @foreach ($pjs as $key => $pj)
    <div class="pj-div row justify-content-center justify-content-md-between mb-2" id="{{$key}}">
        
        <form method="POST" class="d-flex justify-content-center" action="{{ route('giveXp') }}">
        @csrf
            <input type="hidden" name="id" value="{{$key}}">
            <div class="col-auto d-flex justify-content-center align-items-center">
                <select class="form-control text-center" name="type" id="type-select">
                    @foreach ($pj['xpTypes'] as $type)
                        <option value="{{$type}}" id="{{$type}}">
                            {{$type}}
                        </option>
                    @endforeach               
                </select>
            </div>
            <div class="input-group">
                <div class="input-group-btn input-group-prepend">
                    <button type="button" class="btn btn-dark btn-number rounded-left" disabled="disabled" data-type="minus" data-field="amount">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
                <input type="text"  inputmode="numeric" id="amount" name="amount" class="form-control input-number text-center" value="0" min="0" max="1000000">
                <div class="input-group-btn input-group-append">
                    <button type="button"  class="btn btn-dark btn-number rounded-right" data-type="plus" data-field="amount">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn mx-auto text-light meye-btn-green">Asignar</button>
            </div>
            
        </form>
    </div>
    <form method="POST" action="{{ route('managePj') }}">
        @csrf
        <div class="pj-div row mt-4 justify-content-center justify-content-md-between" id="{{$key}}">
            <div class="col-12 mb-3">
                <hr>
            </div>
            <input type="hidden" value="{{$key}}" name="id">
            <div class="col-12 mb-4 d-flex justify-content-center">            
                <h4 class="text-light">Datos generales ({{$pj['nombre']}})</h4>
            </div>
            @foreach ($pj['numeric'] as $name => $value)
            <div class="text-center mb-3 mx-auto">
                <div class="w-75 meye-label mx-auto  rounded-top">
                    {{$value['0']}}
                </div>
                <div class="input-group">
                    <div class="input-group-btn input-group-prepend">
                        <button type="button" class="btn btn-dark btn-number rounded-left" disabled="disabled" data-type="minus" data-field="{{$key}}-{{$name}}">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text"  inputmode="numeric" id="{{$key}}-{{$name}}" name="{{$name}}" class="form-control input-number text-center" value="{{$value[1]}}" min="{{$value[2]}}" max="{{$value[3]}}">
                    <div class="input-group-btn input-group-append">
                        <button type="button"  class="btn btn-dark btn-number rounded-right" data-type="plus" data-field="{{$key}}-{{$name}}">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
            
            <div class="form-group col-12 mt-2">
                <label class="text-light" for="description">Descripción</label>
                <textarea class="form-control" id="description" name="description">{{$pj['description']}}</textarea>
            </div>
            <div class="col-12 d-flex justify-content-around">
                <div class="form-check form-check-inline mx-auto">
                    @if($pj['commerce'])
                        <input class="form-check-input" type="checkbox" checked  name="commerce" id="commerce">
                    @else
                        <input class="form-check-input" type="checkbox" name="commerce" id="commerce">
                    @endif
                    <label class="form-check-label text-light" for="commerce">
                    Permitir comercio
                    </label>
                </div>
                <div class="form-check form-check-inline mx-auto">
                    @if($pj['storage'])
                        <input class="form-check-input" type="checkbox" checked  name="commerce" id="commerce">
                    @else
                        <input class="form-check-input" type="checkbox" name="storage" id="storage">
                    @endif
                    <label class="form-check-label text-light" for="storage">
                    Permitir guardar
                    </label>
                </div>            
            </div>
            <div class="col-8 col-md-6 col-lg-4 d-flex justify-content-center mx-auto">
                @csrf
                <button type="submit" class="btn btn-block my-3 text-light meye-btn-green">
                    <i class="fa fa-save"></i>
                </button>
            </div>            
        </div>        
    </form>
    <form method="POST" action="{{ route('manageOwnerships') }}">
        @csrf
        <input type="hidden" name="id" value="{{$key}}">
        <div class="pj-div row mt-4 justify-content-center justify-content-md-between" id="{{$key}}">
            <div class="col-12 mb-3">
                <hr>
            </div>
            <input type="hidden" value="{{$key}}" name="id">
            <div class="col-12 mb-3 d-flex justify-content-center">            
                <h4 class="text-light">Comercio ({{$pj['nombre']}})</h4>
            </div>
            <div class="col-12 mx-auto">
                <p class="text-justify text-light">El valor bajo el nombre de cada objeto es el número de unidades que permitirá equipar, las cantidades que el pj tenga guardadas no cuentan como equipadas.</p>
            </div>
            @foreach($pj['objects'] as $ownId => $info )
                <div class="text-center mb-3 mt-3 mx-auto">
                    <div class="w-75 meye-label mx-auto  rounded-top">
                        {{$info['name']}}
                    </div>
                    <div class="input-group">
                        <div class="input-group-btn input-group-prepend">
                            <button type="button" class="btn btn-dark btn-number rounded-left" disabled="disabled" data-type="minus" data-field="{{$ownId}}">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text"  inputmode="numeric" id="{{$ownId}}" name="{{$ownId}}" class="form-control input-number text-center" value="{{$info['allowed']}}" min="0" max="1000000">
                        <div class="input-group-btn input-group-append">
                            <button type="button"  class="btn btn-dark btn-number rounded-right" data-type="plus" data-field="{{$ownId}}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-12 d-flex justify-content-center">
                <div class="col-8 col-md-6 col-lg-4 d-flex justify-content-center mx-auto">
                    @csrf
                    <button type="submit" class="btn btn-block my-3 text-light meye-btn-green">
                        <i class="fa fa-save"></i>
                    </button>
                </div>
            </div>
        </div>        
    </form>
    @endforeach

</div>
@endsection