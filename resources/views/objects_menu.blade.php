@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 py-4 d-flex justify-content-center align-items-center">        
        <div class="col-xs-10 col-sm-8 col-md-6 d-flex justify-content-center align-items-center">
            <select class="form-control text-center" id="object-select">
                @foreach ($objects as $id => $object)
                    <option value="{{$id}}"
                        @if(Session::get('last')==$id)
                            selected="" 
                        @endif
                    >
                        {{$object['name']}}
                    </option>
                @endforeach                    
            </select>
        </div>
    </div>
</div>
@foreach ($objects as $id=>$object)
<form method="POST" action="{{ route('updateObject') }}">
<div class="row justify-content-center p-3 object-div" id="{{$id}}">
    <input type="hidden" name="id" value="{{$id}}">
    @foreach ($bool as $name=>$info)
        <div class="form-check mb-3 mx-auto form-check-inline col-5 d-flex justify-content-center mx-auto">
            <input type="checkbox" @if($object[$name]) checked="" @endif  class="form-check-input {{$name}}-checkbox" name="{{$name}}" id='update-{{$name}}-{{$id}}'>
            <label class="form-check-label text-light" for="update-{{$name}}-{{$id}}">{{$info['title']}}</label>
        </div>
    @endforeach
    @foreach ($types as $name=>$info)
        @if ($info['type']=='string')
            <div class="col-8 col-sm-6 col-md-4 mb-3 justify-content-center">                
            
                <div class="w-75 meye-label mx-auto self-align-center text-center rounded-top">
                    {{$info['title']}}
                </div>
                <input id="update-{{$name}}-{{$id}}" type="text" class="form-control text-center @error($name) is-invalid @enderror" name="{{$name}}" value="{{$object[$name]}}" autofocus>

                @error($name)
                    <span class="invalid-feedback text-light ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>
        @elseif ($info['type']=='integer')
            <div class="text-center mb-3 col-8 col-sm-6 col-md-4 @if($info['standard']) standard @endif"

            >                            
                <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                    {{$info['title']}}
                </div>
                <div class="input-group">
                    <div class="input-group-btn input-group-prepend">
                        <button type="button" class="btn btn-dark btn-number rounded-left" disabled="disabled" data-type="minus" data-field="update-{{$name}}-{{$id}}">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" pattern="[0-9]+(\.[0-9]+)?" inputmode="decimal" id="update-{{$name}}-{{$id}}" name="{{$name}}" class="form-control input-number text-center" value="{{$object[$name]}}" min="0" max="{{$info['max']}}">
                    <div class="input-group-btn input-group-append">
                        <button type="button"  class="btn btn-dark btn-number rounded-right" data-type="plus" data-field="update-{{$name}}-{{$id}}">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    @error($name)
                    <span class="invalid-feedback text-light ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        @elseif ($info['type']=='text')
            <div class="col-8 col-sm-12 col-md-8 mb-3">
                <div class="w-75 meye-label mx-auto self-align-center text-center rounded-top">
                    {{$info['title']}}
                </div>
                <textarea class="form-control" name="{{$name}}">{{$object[$name]}}</textarea>
                @error('$name')
                    <span class="invalid-feedback text-light ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        @endif
    @endforeach
    <div class="col-12 d-flex justify-content-center">        
        <div class="col-5 col-md-4 col-lg-3 mt-2">
            @csrf
            <button type="submit" class="btn text-light btn-block meye-btn-blue">
                <i class="fa fa-save"></i>
            </button>
        </div>
        <div class="col-5 col-md-4 col-lg-3 mt-2">
            @csrf
            <button type="button" data-form="delete-{{$id}}" class="btn delete-button meye-btn-red text-light btn-block">
                <i class="fa fa-trash-o"></i>
            </button>
        </div>
    </div>
    
</div>    
</form>
<form method="POST" id="delete-{{$id}}" action="{{ route('deleteObject') }}">
@csrf
<input type="hidden" name="id" value="{{$id}}">
</form>
@endforeach

<form method="POST" action="{{ route('createObject') }}">
<div class="row justify-content-center p-3">
    <div class="col-12">        
        <hr class="mb-4">
    </div>
    <div class="col-12 text-center text-light">
        <h4>Crear objeto</h4>
    </div>
    @foreach ($bool as $name=>$info)
        <div class="form-check mb-3 mx-auto form-check-inline col-5 d-flex justify-content-center mx-auto">
            <input type="checkbox" checked="" class="form-check-input {{$name}}-checkbox" name="{{$name}}" id="create-{{$name}}">
            <label class="form-check-label text-light" for="create-{{$name}}">{{$info['title']}}</label>
        </div>
    @endforeach

    @foreach ($types as $name=>$info)
        @if ($info['type']=='string')
            <div class="col-8 col-sm-6 col-md-4 mb-3 justify-content-center">                
            
                <div class="w-75 meye-label mx-auto self-align-center text-center rounded-top">
                    {{$info['title']}}
                </div>
                <input id="create-{{$name}}" type="text" class="form-control text-center @error($name) is-invalid @enderror" name="{{$name}}" value="" autofocus>

                @error($name)
                    <span class="invalid-feedback text-light ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            
            </div>
        @elseif ($info['type']=='integer')
            <div class="text-center mb-3 col-8 col-sm-6 col-md-4 @if($info['standard']) standard @endif"

            >                            
                <div class="w-75 meye-label mx-auto self-align-center rounded-top">
                    {{$info['title']}}
                </div>
                <div class="input-group">
                    <div class="input-group-btn input-group-prepend">
                        <button type="button" class="btn btn-dark btn-number rounded-left" disabled="disabled" data-type="minus" data-field="create-{{$name}}">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <input type="text" pattern="[0-9]+(\.[0-9]+)?" inputmode="decimal" id="create-{{$name}}" name="{{$name}}" class="form-control input-number text-center" value="0" min="0" max="10000">
                    <div class="input-group-btn input-group-append">
                        <button type="button"  class="btn btn-dark btn-number rounded-right" data-type="plus" data-field="create-{{$name}}">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    @error($name)
                    <span class="invalid-feedback text-light ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        @elseif ($info['type']=='text')
            <div class="col-8 col-sm-12 col-md-8 mb-3">
                <div class="w-75 meye-label mx-auto self-align-center text-center rounded-top">
                    {{$info['title']}}
                </div>
                <textarea class="form-control" name="{{$name}}"></textarea>
                @error('$name')
                    <span class="invalid-feedback text-light ml-2" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        @endif
    @endforeach
    <div class="col-12 d-flex justify-content-center">        
        <div class="col-5 col-md-4 col-lg-3 mt-2">
            @csrf
            <button type="submit" class="btn text-light btn-block meye-btn-green">
                <i class="fa fa-upload"></i>
            </button>
        </div>
    </div>

</div>
</form>
@endsection