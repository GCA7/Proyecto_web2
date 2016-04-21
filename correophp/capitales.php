 <?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "letter";
   //Abrir una conexion con el servidor MySQLfunction
	$mysqli = new mysqli("localhost", "root", "", "letter");

	// /* check connection */
	if ($mysqli->connect_errno) {
	    printf("Connect failed: %s\n", $mysqli->connect_error);
	    exit();
 }
   //Seleccionar todos los registros
$resultado =  $mysqli->query("SELECT `salidas`.`id`, `salidas`.`destinatario`, `salidas`.`asunto`, `salidas`.`contenido` FROM `salidas` WHERE `salidas`.`estado`=1");
foreach($resultado as $resultado){
 echo $id=$resultado["id"];
 echo $destinatario=$resultado["destinatario"];
 echo $asunto=$resultado["asunto"];
 echo $contenido=$resultado["contenido"];
//aquí va a parte de envío de correo
$result =  $mysqli->query("INSERT * INTO `enviados`.`id`, `enviados`.`destinatario`, `enviados`.`asunto`, `enviados`.`contenido` values ($id, $destinatario, $asunto, $contenido));

//Aquí se actualiza la bd una vez que se envío el correo
$actualiza=$mysqli->query("UPDATE 'salidas' SET salidas.estado='false' WHERE id=$id");
}
?>
