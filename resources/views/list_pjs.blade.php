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
    <input type="hidden" name="id" value="{{$key}}">
    <div class="pj-div {{$pj['fortaleza1']}} {{$pj['fortaleza2']}}" id="{{$key}}">
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
                        <input type="text" name='fuer' pattern="[0-9]*" inputmode="numeric" value="{{$pj['fuer']}}" style="text-align: center" class="data form-control bg-light" placeholder="" >
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
                        <input type="text" name='velo' pattern="[0-9]*" inputmode="numeric" value="{{$pj['velo']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="agil" pattern="[0-9]*" inputmode="numeric" value="{{$pj['agil']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="resi" pattern="[0-9]*" inputmode="numeric" value="{{$pj['resi']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" pattern="[0-9]*" inputmode="numeric" value="{{$pj['inte']}}" name="inte" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="sabi" pattern="[0-9]*" inputmode="numeric" value="{{$pj['sabi']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="conc" pattern="[0-9]*" inputmode="numeric" value="{{$pj['conc']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="volu" pattern="[0-9]*" inputmode="numeric" value="{{$pj['volu']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="prec" pattern="[0-9]*" inputmode="numeric" value="{{$pj['prec']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="calc" pattern="[0-9]*" inputmode="numeric" value="{{$pj['calc']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="rang" pattern="[0-9]*" inputmode="numeric" value="{{$pj['rang']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="refl" pattern="[0-9]*" inputmode="numeric" value="{{$pj['refl']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
        <section class="row pt-2 pb-1 mx-auto flex-wrap justify-content-center justify-content-sm-around">
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
                        <input type="text" name="vida" pattern="[0-9]*" inputmode="numeric" value="{{$pj['vida']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            <section class="ener col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
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
                        <input type="text" name="ener" pattern="[0-9]*" inputmode="numeric" value="{{$pj['ener']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            @if ($pj['fortaleza1']=='Energia')
            <section class="ener col-8  col-sm-5 col-md-3 d-flex flex-column align-items-center mx-sm-auto mx-md-0 justify-content-between mb-3 bg-dark text-light py-2 rounded">
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
                        <input type="text" name="ener2" pattern="[0-9]*" inputmode="numeric" value="{{$pj['ener2']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            @endif
            
        </section>

        <!-- H. Energía -->
        <section class="row py-2 mb-2 mx-auto flex-wrap justify-content-center justify-content-sm-between">
            <section class="col-8 Hcorp col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
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
                        <input type="text" name="pote" pattern="[0-9]*" inputmode="numeric" value="{{$pj['pote']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="vita" pattern="[0-9]*" inputmode="numeric" value="{{$pj['vita']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>                
            </section>
            <section class="col-8  Hment col-sm-5 col-md-3 d-flex flex-column align-items-center justify-content-between mb-3 bg-dark text-light py-2 rounded">                        
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
                        <input type="text" name="iluc" pattern="[0-9]*" inputmode="numeric" value="{{$pj['iluc']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="ment" pattern="[0-9]*" inputmode="numeric" value="{{$pj['ment']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                
            </section>
            <section class="col-8 Hener col-sm-5 col-md-3 d-flex flex-column align-items-center mx-sm-auto mx-md-0 justify-content-between mb-3 bg-dark text-light py-2 rounded">
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
                        <input type="text" name="obje" pattern="[0-9]*" inputmode="numeric" value="{{$pj['obje']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
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
                        <input type="text" name="pura" pattern="[0-9]*" inputmode="numeric" value="{{$pj['pura']}}" style="text-align: center" class="data form-control bg-light" placeholder="">
                        <div class="input-group-append">
                            <button style="min-width: 2.5rem" class="btn btn-increment btn-outline-light" type="button">
                                <strong>+</strong>
                            </button>
                        </div>
                    </div>
                </div>
                
            </section>
            
        </section>
        <div class="row mb-5 justify-content-center">
            <div class="col-8 col-md-6 col-lg-4 mb-0 form-group">
                <button type="submit" class="btn text-light meye-btn-green btn-block">Guardar</button>
            </div>            
        </div>
        <section class="row p-1 mx-auto bg-secondary fixed-bottom d-flex flex-wrap justify-content-center text-light">
            <div class="col-auto  text-center">
                <strong>
                    Tipo 1: <span class="t1-val">val</span> / {{$pj['xp1']}}
                </strong>
            </div >
            <div class="col-auto  text-center">
                <strong>
                    Tipo 2: <span class="t2-val">val</span> / {{$pj['xp2']}}
                </strong>
            </div >
            @if($pj['tipo']=='Soko')
                <div class="col-auto  text-center">
                    <strong>
                        Tipo 3: <span class="t3-val">val</span> / {{$pj['xp3']}}
                    </strong>
                </div>
            @endif            
        </section>
    </div>
    </form>
    @endforeach
</div>
@endsection