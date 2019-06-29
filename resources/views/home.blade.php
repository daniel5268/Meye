@extends('layouts.app')

@section('content')
<div class="row flex-column justify-content-center pt-3">
	<div class="col-12 p-3 bg-secundary text-light">
		<p class="text-center"> Bienvenido {{Auth::user()->username}} </p>
		<p class="text-center"> Este es el asistente digital de las tierras de meye </p>
	</div>
</div>
@endsection
