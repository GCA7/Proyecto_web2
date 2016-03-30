@extends('layouts.principal')

@section ('title', 'User Login')

@section('content')

	<section class="centrar container espacio col">
			<form name="form_login" method="POST" action="{{asset('loguear')}}">
				<div class="container animated zoomIn">
					<div class="row">
						<div class="col-sm-6 col-md-4 col-md-offset-4">
							<h1 class="text-center login-title">Sign in to Letter</h1>
							<div class="account-wall">
								<img class="profile-img" src="Imagenes/email-icon.png"
								alt=""></br
								<form class="form-signin">
									<input type="text" class="form-control" placeholder="Email" required autofocus id="email" name="log_email" required>
									<input type="password" class="form-control" placeholder="Password" required id="contrasena" name="log_pass" required>
									<button class="btn btn-lg btn-primary btn-block" type="submit" Onclick="LOGIN.Login();">
										Sign in</button>
									</form>
								</div>
								<a href="registro.html" class="text-left new-account">Sing up</a>
							</div>
						</div>
					</div>
				</form>
	</section>
@stop