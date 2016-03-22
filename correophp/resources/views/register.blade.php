<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="Imagenes/email-2-icon.png" rel="shortcut icon" type="image/png"> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/main.css">
	<title>Letter-Registro</title>
</head>
<body>
	<div class="container">
		<div class="col-md-12">
			<h1 class="letras">Crea tu cuenta de Letter</h1>
			<div class="row">
				<div class="col-md-4 visible-desktop visible-tablet">
					<section class="izquierda">
						<p>Letter</p>
						<p>The email app that's simple, smart and beautiful</p>
						<img src="Imagenes/mail.ico">
					</div>
				</br>
			</section>
			<div class="derecha col-md-6">
				<form name="form_registro" method="POST">
					<header class="pr"><h1>Registro</h1></header> </br>
					<div class="input-group">
						<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="UserName" aria-describedby="basic-addon1" id="usuario" required>
					</div>
				</br>
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Email" id="email" aria-describedby="basic-addon2" required>
					<span class="input-group-addon" id="basic-addon2">@letter.com</span>
				</div>
			</br>
			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
				<input type="password" class="form-control" placeholder="Password" id="contrasena" aria-describedby="basic-addon1" required>
			</div>
		</br>
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
			<input type="date" class="form-control" placeholder="Username" id="calendar" aria-describedby="basic-addon1">
		</div>
	</br>
	<select id="sexo" class="tamano">
		<option  value="Hombre">Hombre</option>
		<option  value="Mujer">Mujer</option>
	</select> </br> </br>
	<p class="text">
		<input type="checkbox" id="checkterm" name="terminos" value="Terminos"/> 
		Acepto las Condiciones del Servicio 
		y la Politica de Privacidad de Letter.
	</p>
</br>
<button class="boton sombra" target="_blank" onClick="LOGIN.guardarusuario();">Acceder </button> 
<button class="boton sombra" type="button" href="{{asset('/login')}}">Cancelar </button> </br>
</form>
</div>
</div>
</div>
<script type="text/javascript" src="js/correo.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>