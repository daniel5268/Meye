@extends('layouts.app')

@section('content')
	
	<div class="row flex-column justify-content-center pt-3">
		<div class="col-12 p-3 bg-secundary text-light">
			<p class="text-justify text-md-center"> Seleccione el boton de un usuario para restablecer su contraseña, su nueva contraseña será "newpassword" sin las comillas</p>
		</div>
		@foreach ($users as $id => $username)
		<div class="mb-3">			
			<form method="POST" class="d-flex justify-content-center" action="{{ route('passwordReset') }}">
				@csrf
				<div class="col-10 col-md-8 mb-0 form-group">
					<input type="hidden" name="id" value="{{$id}}">
					<button type="submit" class="btn text-light meye-btn-blue btn-block"> {{$username}}</button>
				</div>
			</form>
		</div>
		@endforeach
	</div>
@endsection
