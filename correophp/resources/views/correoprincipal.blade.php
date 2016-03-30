@extends('layouts.principal')
@section('content')
<header class=" color h sombra">
		<nav>
			<img class="im verticalLine"src="Imagenes/email-icon.png">
			<button class="boton b3" type="button" onclick = "location.href='index2.html'">Cerrar Sesion </button>
			<img class="im dere2" id="imgavatar" title="Cuenta de Letter: Greivin Calvo Aguilar - greivindca7@letter.com"src="Imagenes/Avatar.png">
			<p class="der2 visible-desktop visible-tablet" id="nomuser"></p>
			<p class="pe visible-desktop visible-tablet">Letter</p>
			<p id="username" class="pe" value=""></p>
		</nav>
	</header>
	<section class="container containertan">
		<div class="nav row">
			<div class="col-md-12">
			<button type="button" title="Crear correo nuevo" class="b2" id="redactar" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Redactar</button> </br>
			<hr>
			<ul >
				<li id="salida"class="a imagenConPieDeTexto seleccionado"><span class="glyphicon glyphicon-inbox"></span><a class="a left" selected="selected" onClick="LOGIN.cargarcorreos(); LOGIN.seleccionado2();">Salida</a><span class="badge left" id="icorreos"></span></li>
				<li id="enviados" class="a imagenConPieDeTexto"><span class="glyphicon glyphicon-inbox"></span><a class="a left" onClick="LOGIN.cargarcorreosenviados(); LOGIN.seleccionado(); ">Enviados</a><span class="badge left" id="ienviados"></span></li>
			</ul>
		 </div>
		</div>
		<nav class="floatright">
			<p id="fecha" class="hoy salto visible-desktop visible-tablet">Hoy</p>
			<div class="dere">
				<a value="Actualizar Página" onclick="window.location.reload()"><span title="Recargar la página" class="glyphicon glyphicon-refresh tamano-icon visible-desktop visible-tablet"> </span></a>
			</div>
			<hr class="visible-desktop visible-tablet">
			<div class="row" id="correos_borrados">
				<div class="col-sm-4 col-md-6">
					<form id="correo">
				</div>
			</div>
		</nav>
	</section>
		<div class="modal animated fadeInUp arr" keyboard: "false" data-keyboard="false" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">New message</h4>
					</div>
					<div class="modal-body">
						<form id="emisor" name="form_redactar">
							<div class="form-group">
								<label for="recipient-name" class="control-label"></label>
								<input type="text" class="form-control" id="paramsj" placeholder="Para:">
							</div>
							<div class="form-group">
								<label for="recipient-name" class="control-label"></label>
								<input type="text" class="form-control" id="asuntomsj" placeholder="Asunto:">
							</div>
							<div class="form-group">
								<label for="message-text" class="control-label"></label>
								<textarea class="form-control" id="contenidomsj" placeholder="Message:"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" onClick="LOGIN.salidaguardado(); LOGIN.cargarcorreos();">Save Message</button>
						<button type="button" class="btn btn-primary" onClick="LOGIN.enviadosguardado(); LOGIN.cargarcorreosenviados();">Send message</button>
					</div>
				</div>
			</div>
		</div>
@stop