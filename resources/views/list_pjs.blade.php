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
    <form method="POST">
    @csrf
    <div class="pj-div {{$pj['fortaleza1']}} {{$pj['fortaleza2']}}" id="{{$key}}">
        <input type="hidden" name="id" value="{{$key}}">
        <div class="row mx-auto bg-dark  d-flex justify-content-center justify-content-md-between text-light  mb-3 rounded">
            <div class="col-auto  text-center">
                Tipo : {{$pj['tipo']}}
            </div >
            <div class="col-auto  text-center">
                Edad : {{$pj['edad']}}
            </div >
            <div class="col-auto  text-center">
                Altura : {{$pj['altura']}}
            </div>
            <div class="col-auto  text-center">
                Peso : {{$pj['peso']}}
            </div>
            <div class="col-auto  text-center">
                Locura : {{$pj['cordura']}}
            </div><div class="col-auto  text-center">
                Renels : {{$pj['renels']}}
            </div>
        </div>
        <div class="row mx-auto bg-dark  d-flex justify-content-center justify-content-lg-between text-light  mb-3 rounded pb-3">

            <div class="col-auto col-md-6 col-lg-4">            
                <input   id="apar" type="hidden" value="{{$pj['apariencia']}}" >
                <canvas  class= "apar"></canvas>
            </div>
            <div class="col-auto col-md-6 col-lg-4">            
                <input id="cari" type="hidden" value="{{$pj['carisma']}}">
                <canvas  class= "cari"></canvas>
            </div>
            <div class="col-auto col-md-6 col-lg-4">            
                <input id="vill"  type="hidden" value="{{$pj['villania']}}">
                <input id="hero"  type="hidden" value="{{$pj['heroismo']}}">
                <canvas class= "pieChart"></canvas>
            </div>
        </div>
        <!-- Tipo1 -->
        <section class="row pt-2 pb-1 mb-0 flex-wrap justify-content-center justify-content-sm-between">
            @foreach ($pj['section1'] as $title => $group)
            
            <section class="{{$title}} col-8  col-sm-5 mx-sm-auto col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">
                {{$title}}
                <span class="my-1"></span>
                @foreach ($group as $atribute => $value)
                
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        {{$atribute}}
                    </div>
                    <div class="input-group">
                        <div class="input-group-btn input-group-prepend">
                            <button type="button" class="btn btn-secondary btn-number rounded-left" disabled="disabled" data-type="minus" data-field="{{$key}}-{{$value[0]}}">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text"  id="{{$key}}-{{$value[0]}}" name="{{$value[0]}}" class="form-control input-number text-center" value="{{$value[1]}}" min="{{$value[1]}}" max="10000">
                        <div class="input-group-btn input-group-append">
                            <button type="button"  class="btn btn-secondary btn-number rounded-right" data-type="plus" data-field="{{$key}}-{{$value[0]}}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                @endforeach
            </section>
            @endforeach
        </section>
                

        <!-- Reservas -->
        <section class="row pt-2 pb-1 mx-auto flex-wrap justify-content-center justify-content-sm-around">
            @foreach ($pj['tanks'] as $atribute => $value)
            <section class="t1 {{$atribute}} col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        {{$atribute}}
                    </div>
                    <div class="input-group">
                        <div class="input-group-btn input-group-prepend">
                            <button type="button" class="btn btn-secondary btn-number rounded-left" disabled="disabled" data-type="minus" data-field="{{$key}}-{{$value[0]}}">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text"  id="{{$key}}-{{$value[0]}}" name="{{$value[0]}}" class="form-control input-number text-center" value="{{$value[1]}}" min="{{$value[1]}}" max="10000">
                        <div class="input-group-btn input-group-append">
                            <button type="button"  class="btn btn-secondary btn-number rounded-right" data-type="plus" data-field="{{$key}}-{{$value[0]}}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach            
        </section>

        <!-- H. Energía -->
        <section class="row pt-2 pb-1 mb-0 flex-wrap justify-content-center justify-content-sm-between">
            @foreach ($pj['section2'] as $title => $group)
            <section class="{{$title}} col-8 mx-sm-auto col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">
                {{$replace[$title]}}
                <span class="my-1"></span>
                @foreach ($group as $atribute => $value)
                
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        {{$atribute}}
                    </div>
                    <div class="input-group">
                        <div class="input-group-btn input-group-prepend">
                            <button type="button" class="btn btn-secondary btn-number rounded-left" disabled="disabled" data-type="minus" data-field="{{$key}}-{{$value[0]}}">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text"  id="{{$key}}-{{$value[0]}}" name="{{$value[0]}}" class="form-control input-number text-center" value="{{$value[1]}}" min="{{$value[1]}}" max="10000">
                        <div class="input-group-btn input-group-append">
                            <button type="button"  class="btn btn-secondary btn-number rounded-right" data-type="plus" data-field="{{$key}}-{{$value[0]}}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                @endforeach
            </section>
            @endforeach
        </section>
        <section class="row  mx-auto bg-muted fixed-bottom d-flex flex-wrap justify-content-center text-light">
            <div class="w-75  p-1 meye-calc-div mx-auto d-flex flex-wrap justify-content-around self-align-center">
                <div class="meye-calc-value col-auto mb-1 text-center rounded">
                    <strong>
                        Tipo 1: <span class="t1-val">val</span> / {{$pj['xp1']}}
                    </strong>
                </div >
                <div class="meye-calc-value col-auto mb-1 text-center rounded">
                    <strong>
                        Tipo 2: <span class="t2-val">val</span> / {{$pj['xp2']}}
                    </strong>
                </div >
                @if($pj['tipo']=='Soko')
                    <div class="meye-calc-value col-auto mb-1 text-center rounded">
                        <strong>
                            Tipo 3: <span class="t3-val">val</span> / {{$pj['xp3']}}
                        </strong>
                    </div>
                @endif
            </div>
        </section>
        <div class="row justify-content-center mb-5">
            <div class="col-8 col-md-6 col-lg-4">
                <button type="submit" class="btn text-light meye-btn-green btn-block">Guardar</button>
            </div>
        </div>
    </div>
    </form>
    @endforeach
</div>
@endsection