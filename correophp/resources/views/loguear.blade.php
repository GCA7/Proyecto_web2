@extends('layouts.principal')

@section ('title', 'User Welcome')

@section('content')
	<section class="centrar container espacio col">
			<form name="form_login" method="POST" action="{{asset('loguear')}}">
			{{Csrf_field ()}}
			<img class="profile-img" src="../img/email-icon.png" alt=""></br>
				<div class="container animated zoomIn">
					<div class="row">
						<div class="col-sm-6 col-md-4 col-md-offset-4">
							<h4 class="text-center login-title">Sign in to Letter</h4>
							<div class="account-wall">
								<form class="form-signin">
									<input type="text" class="form-control" placeholder="Email" required autofocus id="email_login" name="log_email" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
									<input type="password" class="form-control" placeholder="Password" required id="contrasena" name="log_pass" required>
									<button class="btn btn-lg btn-primary btn-block" type="submit" onclick="LOGIN.useronline()">
										Sign in</button>
									</form>
								</div>
								<a href='register' class="text-left new-account">Sing up</a>
							</div>
						</div>
					</div>
				</form>
				<br>
				<footer class="animated bounceInLeft"><p>{{$error}}</p></footer>
	</section>
@stop