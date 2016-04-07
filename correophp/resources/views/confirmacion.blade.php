@extends('layouts.principal')

@section ('title', 'Confirm')

@section('content')
<form method="POST" action="{{asset('activar')}}">
	<div class="container" style="margin-top: 20%">
		<h3>Gracias por unirte a letter, por favor confirma tu correo para activar tu cuenta</h3>
		<input placeholder="email" name="email"></input>
		<button class="boton sombra btn-success-border" type="submit">Confirmar cuenta</button>
	</div>
</form>


@stop