var conti=0;
var conta=0;
var cambio=true;


var LOGIN=LOGIN||
{ 
	mostrar:function(){
  //funcion que muestra contenido oculto
  debugger;
  document.getElementById('oculto').style.display = 'block';
  document.getElementById('btnsesion').style.display = 'none';
  document.getElementById('btnregistro').style.display = 'none';

	
},useronline:function(){
  //funcion que guarda el usuario que se acaba de loguear
  debugger;
  var conectado = document.getElementById("email_login").value;
  var enlinea={'online':conectado};
  localStorage.setItem("Online",JSON.stringify(enlinea));

},salidaguardado:function(){
  //funcion para guardar los mensajes de la bandeja de salida
  debugger;
  var destinatario = document.getElementById("paramsj").value;
  var asunto = document.getElementById("asuntomsj").value;
  var contenido = document.getElementById("contenidomsj").value;
  if(LOGIN.validarlightbox()){
    var bandejaborrador=new Array();
    useronline = JSON.parse(localStorage.getItem("Online")).online;
    var correos=JSON.parse(localStorage.getItem("Borradores"));
    var newmsj={'User':useronline,'para':destinatario,'asunto':asunto,'contenido':contenido};
    if(correos===null){
      bandejaborrador.push(newmsj);
      localStorage.setItem("Borradores",JSON.stringify(bandejaborrador));
    }else{
      correos.push(newmsj);  
      localStorage.setItem("Borradores",JSON.stringify(correos));
    }
    document.getElementById("paramsj").value ="";
    document.getElementById("asuntomsj").value ="";
    document.getElementById("contenidomsj").value ="";
  }
  

},validarlightbox:function(){
  //funcion para validar que el lightbox lleve todos sus campos llenos
  debugger;
  var para = document.getElementById("paramsj").value;
  var asunto = document.getElementById("asuntomsj").value;
  var contenido = document.getElementById("contenidomsj").value;
  var validacioncorreo = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  if(!validacioncorreo.test(para)){
    alert("Dirección de correo incorrectos");
  }else if(asunto==""&&contenido==""){
    alert("Debe llenar todos los campos")
  }else{
    return true;
  }
  $("#redactar").click();

},enviadosguardado:function(){
  //funcion para guardar los correos de la bandeja de enviados
 debugger;
 var destinatario = document.getElementById("paramsj").value;
 var asunto = document.getElementById("asuntomsj").value;
 var contenido = document.getElementById("contenidomsj").value;
 var useron=JSON.parse(localStorage.getItem("Online")).online;
 if(LOGIN.validarlightbox()){
    window.open('correoprincipal/'+useron+'/'+destinatario+'/'+asunto+'/'+contenido);
  }
  document.getElementById("paramsj").value ="";
  document.getElementById("asuntomsj").value ="";
  document.getElementById("contenidomsj").value ="";

},mostrarcontenido:function(aidi){
  //funcion que muestra el contenido del correo de la bandeja de salida
  debugger;
  var enviado_html = "";
  this.aidi=aidi;
  salida= JSON.parse(localStorage.getItem("Borradores"));
  for (var i = 0; i < salida.length; i++) {
    if(i===aidi){
      var maniacs="C"+i;
      var mos=salida[i];
      borrador_html = borrador_html +"<div id="+"M"+i+" class='ocultar pr colocar animated fadeOutDown'><div><div class=colornuevo sombra2>"+
      "<header class='he'><div><p class=txt izq>"+mos.asunto+"</p><div class=>"+
      "<a onclick=document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block' title=Eliminar correo>"+
      "<img class='padding' title='Responder mensaje' src='Imagenes/responder.png'><a/>"+
      "<a onClick='' title=Eliminar correo><img class='padding' title='Editar mensaje' src='Imagenes/edit.png'>"+
      "<a/><a onClick='LOGIN.eliminarcorreoborrador();' title='Eliminar correo'><img class='padding' src='Imagenes/trash.png'><a/>"
      +"</div></div></header><hr>"+ "<div class='div'><p class='txt-izq'>"+mos.para+"</p>"+"<div>"+"<header>" + mos.asunto +"</header>"+"</div><div>"+"<p class='contenido'>"+mos.contenido+"</p>"+"</div>"+"</div>"
      +"</div></div></div>";
    }
  }
  document.getElementById(maniacs).innerHTML=borrador_html;

},mostrarcontenidoenviados:function(aid){
  //funcion que muestra el contenido del correo de la bandeja de enviados
  debugger;
  var enviado_html = "";
  this.aid=aid;
  enviado= JSON.parse(localStorage.getItem("Enviados"));
  for (var i = 0; i < enviado.length; i++) {
    if(i===aid){
      var mani="E"+i;
      var envi=enviado[i];
      enviado_html = enviado_html +"<div id="+"M"+i+" class='ocultar pr colocar animated fadeOutDown'><div><div class=colornuevo sombra2>"+
      "<header class=he><div><p class=txt izq>"+envi.asunto+"</p><div class=>"+
      "<a onclick=document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block' title=Eliminar correo>"+
      "<a onclick='' title=Eliminar correo><img class='padding' title='Editar mensaje' src='Imagenes/edit.png'>"+
      "<a/><a onClick='LOGIN.eliminarcorreoenviados();' title='Eliminar correo'><img class='padding' src='Imagenes/trash.png'><a/>"
      +"</div></div></header><hr>"+ "<div class='div'><p class='txt-izq'>"+envi.para+"</p>"+"<div>"+"<header>" + envi.asunto +"</header>"+"</div><div>"+"<p class='contenido'>"+envi.contenido+"</p>"+"</div>"+"</div>"
      +"</div></div></div>";
    }
  }
  document.getElementById(mani).innerHTML=enviado_html;

},contoculto:function(aidi2){
  //funcion que muestra el contenido oculto del correo de la bandeja de salida
  debugger;
  var culto="M"+aidi2;
  if(conti===0){
    conti=conti+1;
    document.getElementById(culto).style.display = 'block';
  }else{
    conti=0;
    document.getElementById(culto).style.display = 'none';
  }


},contoculto2:function(aidi4){
  //funcion que muestra el contenido oculto del correo de la bandeja de enviados
  debugger;
  var cul="O"+aidi4;
  if(conta===0){
    conta=conta+1;
    document.getElementById(cul).style.display = 'block';
  }else{
    conta=0;
    document.getElementById(cul).style.display = 'none';
  }
},cargarnombre:function(){
  //funcion para mostrar el nombre del usuario que se acaba de loguear
 var uuser = JSON.parse(localStorage.getItem("Online")).online;
 $('#nomuser').html(uuser);

},editarcorreoborrador:function(edit){
  //funcion que permite editar correos en la bandeja de salida
  debugger;
  this.edit = edit;
  document.getElementById("M"+edit).style.display='none';
  editarcorreo= JSON.parse(localStorage.getItem("Borradores"));
  for (var i = 0; i < editarcorreo.length; i++) {
    if(edit===i){
      var editarmensaje= "<div>"+
      "<div id="+"O"+i+" onClick='LOGIN.contoculto2("+edit+");'></div><div class='colornuevo sombra2'><header class='he'><div><input id='ediasunto' class='ta color' type=text value="+editarcorreo[i].asunto+"></div>"+
      "</header><hr><div class='div'><input id='edipara' class='ta color' type=text value="+editarcorreo[i].para+">"+
      "<div></br><textarea id='edicontenido' class='tamano3 col2' type='text' placeholder='Escribe aqui'>"+editarcorreo[i].contenido+"</textarea>"+
      "<button title='Enviar mensaje editado' class='boton b2 bt' type=button onClick='LOGIN.guardaredicion("+i+");'><span class='glyphicon glyphicon-ok'></span></button><button title='Cancelar edicion' onClick='document.getElementById("+"O"+i+").style.display='none';' class='boton b2 bt colo sp' type=button><span class='glyphicon glyphicon-remove'></span></button></div></br></div></div></div>";
      break;
    }
  }
  document.getElementById("C"+edit).innerHTML=editarmensaje;
},seleccionado:function(){
  //funcion para que el usuario note cual bandeja tiene seleccionada (bandeja de enviados)
  debugger;
  if(cambio===true){
    $("#salida").removeClass("seleccionado");
    $("#enviados").addClass("seleccionado");
    cambio=false;
  }
},seleccionado2:function(){
  //funcion para que el usuario note cual bandeja tiene seleccionada (bandeja de salida)
  debugger;
  if(cambio===false){
    $("#salida").addClass("seleccionado");
    $("#enviados").removeClass("seleccionado");
    cambio=true;
  }
},borradorguardado:function(){
  //funcion para guardar los correos de la bandeja de enviados
 debugger;
 var destinatario = document.getElementById("paramsj").value;
 var asunto = document.getElementById("asuntomsj").value;
 var contenido = document.getElementById("contenidomsj").value;
 var useron=JSON.parse(localStorage.getItem("Online")).online;
 if(LOGIN.validarlightbox()){
    window.open('borrador/'+useron+'/'+destinatario+'/'+asunto+'/'+contenido);
  }
  document.getElementById("paramsj").value ="";
  document.getElementById("asuntomsj").value ="";
  document.getElementById("contenidomsj").value ="";

}

};
