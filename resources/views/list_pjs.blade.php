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
    <div class="pj-div xp-calc-div {{$pj['fortaleza1']}} {{$pj['fortaleza2']}}" id="{{$key}}">
        <div class="row mx-auto bg-dark  d-flex justify-content-center justify-content-sm-between text-light  mb-3 rounded">
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
            </div>
        </div>
        <div class="row mx-auto bg-dark  d-flex justify-content-center justify-content-lg-between text-light  mb-3 rounded pb-3">

            <div class="col-auto col-md-6 col-lg-4">            
                <input id="apar" type="hidden" value="{{$pj['apariencia']}}" >
                <canvas  class= "apar"></canvas>
            </div>
            <div class="col-auto col-md-6 col-lg-4">            
                <input id="cari" type="hidden" value="{{$pj['carisma']}}">
                <canvas  class= "cari"></canvas>
            </div>
            <div class="col-auto col-md-6 col-lg-4">            
                <input id="vill" type="hidden" value="{{$pj['villania']}}">
                <input id="hero" type="hidden" value="{{$pj['heroismo']}}">
                <canvas class= "pieChart"></canvas>
            </div>
        </div>
        <!-- Tipo1 -->
        <section class="row pt-2 pb-1 mb-0 mx-auto flex-wrap justify-content-center justify-content-sm-between">
            <section class="fis col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Fuerza
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="" >
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Velocidad
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Agilidad
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Resistencia
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                        
            </section>
            <section class="men col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Inteligencia
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Sabiduría
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Concentración
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Voluntad
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                        
            </section>
            <section class="coor col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center mx-sm-auto mx-md-0 justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Precisión
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Cálculo
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Rango
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Reflejos
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                        
            </section>                    
        </section>

        <!-- Reservas -->
        <section class="row pt-2 pb-1 mx-auto flex-wrap justify-content-center justify-content-sm-between">
            <section class="t1 life col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Vida
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t1-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            <section class="col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Energía
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            <section class="col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center mx-sm-auto mx-md-0 justify-content-between mb-3 bg-dark text-light py-2 rounded">
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Energía Esp.
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            
        </section>

        <!-- H. Energía -->
        <section class="row py-2 mb-2 mx-auto flex-wrap justify-content-center justify-content-sm-between">
            <section class="col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Potenciación
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Control Vital
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            <section class="col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Ilución
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Control Mental
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                
            </section>
            <section class="col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center mx-sm-auto mx-md-0 justify-content-between mb-3 bg-dark text-light py-2 rounded">
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Control de objetos.
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-center mb-3">                            
                    <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                        Energía pura
                    </div>
                    <div class  ="input-group  ">
                        <div class="input-group-prepend">
                            <button style="min-width: 2.5rem" class="btn btn-decrement btn-outline-light" type="button">
                                <strong>-</strong>
                            </button>
                        </div>
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="t2-data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                
            </section>
            
        </section>
        <section class="row fixed-bottom exp-row justify-content-between bg-dark text-light p-2 rounded-top">
            <div class="col-6 d-flex justify-content-center" id="spent">
                <div class="col-auto"><strong>Gastada</strong></div>
                <div class="col-auto">{{$pj['fortaleza1']}}</div>
            </div>
            <div class="col-6 d-flex justify-content-center" id="stock">
                <div class="col-auto"><strong>Ganada</strong></div>
                <div class="col-auto">{{$pj['fortaleza2']}}</div>                
            </div>
        </section>
    </div>
    @endforeach
</div>
@endsection