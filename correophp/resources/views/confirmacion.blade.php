@extends('layouts.principal')

@section ('title', 'Confirm')

@section('content')
<form method="POST" action="{{asset('activar')}}">
	<div class="container" style="margin-top: 10%">
		<h3>Gracias por unirte a letter, por favor confirma tu correo para activar tu cuenta</h3>
		<input placeholder="email" name="email" required></input>
		<button class="botones sombra btn-success-border" type="submit" value="Confirmar">Confirmar</button>
	</div>
</form>
<img src="../img/mail.ico" class="confirm">
@stop