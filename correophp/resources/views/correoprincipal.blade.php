@extends('layouts.principal')
@section('content')
<div class="cuerpo">
	<header class="color h sombra">
		<nav>
			<img class="im verticalLine"src="../img/email-icon.png">
			<button class="boton b3" type="button" onClick="{{asset('login')}}">Cerrar Sesion </button>
			<img class="im dere2" id="imgavatar" title="Cuenta de Letter: Greivin Calvo Aguilar - greivindca7@letter.com" src="../img/Avatar.png">
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
					<li id="salida"class="a imagenConPieDeTexto"><span class="glyphicon glyphicon-envelope icon"></span><a class="a left" selected="selected">Borrador</a><span class="badge left" id="icorreos"></span></li>
					<li id="salida"class="a imagenConPieDeTexto seleccionado"><span class="glyphicon glyphicon-inbox icon"></span><a class="a left" selected="selected" >Salida</a><span class="badge left" id="icorreos"></span></li>
					<li id="enviados" class="a imagenConPieDeTexto"><span class="glyphicon glyphicon-send icon"></span><a class="a left" location.href('correoprincipal')>Enviados </a><span class="badge left" id="ienviados"></span></li>
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
					
					<?php if (is_array ($correos)) {
						foreach($correos as $correos) { ?>
						<tr>
						<td><?php echo( $correos->asunto); ?></td>
						<td><?php echo( $correos->para ); ?></td>
						<td><?php echo( $correos->contenido ); ?></td>
						<td><button id="<?php echo $correos->id?>" type="button" class="btn btn-default btn-lg">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</button></td>
							</tr>
							
							<?php }} ?>
						</div>
					</div>
				</nav>
			</section>
			<section>
				<form name="modalform" method="POST">
					<div class="modal animated fadeInUp arr" keyboard: "false" data-keyboard="false" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="exampleModalLabel">New message</h4>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label for="recipient-name" class="control-label"></label>
										<input type="text" class="form-control" id="paramsj" name="para" placeholder="Para:" multiple required>
									</div>
									<div class="form-group">
										<label for="recipient-name" class="control-label"></label>
										<input type="text" class="form-control" id="asuntomsj" name="asunto" placeholder="Asunto:" required>
									</div>
									<div class="form-group">
										<label for="message-text" class="control-label"></label>
										<textarea class="form-control" id="contenidomsj" name="contenido" placeholder="Message:"></textarea>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-default" data-dismiss="modal">Save</button>
										<button type="submit" class="btn btn-primary" onClick="LOGIN.enviadosguardado();">Send</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</section>
		</div>
		@stop