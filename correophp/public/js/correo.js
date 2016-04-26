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

},enviadosguardado:function(aidi){
  //funcion para guardar los correos de la bandeja de enviados
 debugger;
 var destinatario = document.getElementById("paramsj").value;
 var asunto = document.getElementById("asuntomsj").value;
 var contenido = document.getElementById("contenidomsj").value;
 var useron=JSON.parse(localStorage.getItem("Online")).online;
 var bandeja="salida";
 if(LOGIN.validarlightbox()){
    var actual=window.location.href;
    window.open('correoprincipal/'+useron+'/'+destinatario+'/'+asunto+'/'+contenido+'/'+bandeja+'/'+aidi);
    window.close(actual);
  }
  document.getElementById("paramsj").value ="";
  document.getElementById("asuntomsj").value ="";
  document.getElementById("contenidomsj").value ="";

},mostrarcontenido:function(aidi){
  //funcion que muestra el contenido del correo de la bandeja de salida
  debugger;
  document.forms["cargar"]["para"].value=document.getElementById('corrpara').innerText;
  document.forms["cargar"]["asuntom"].value=document.getElementById('corrsun').innerText;
  document.forms["cargar"]["contenidom"].value=document.getElementById('corrcont').innerText;

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

},editarcorreo:function(bandeja, aidi){
  //funcion que permite editar correos en la bandeja de salida
  debugger;
  document.forms["modalform"]["para"].value=document.getElementById('corrpara').innerText;
  document.forms["modalform"]["asunto"].value=document.getElementById('corrsun').innerText;
  document.forms["modalform"]["contenido"].value=document.getElementById('corrcont').innerText;
  if(bandeja=='salida'){
    document.getElementById('save').style.display = 'none';
    document.getElementById('save').removeAttribute("onclick");
    document.getElementById('save').setAttribute("onclick","LOGIN.borradorguardado("+aidi+")");
    document.getElementById('send').removeAttribute("onclick");
    document.getElementById('send').setAttribute("onclick","LOGIN.enviadosguardado("+aidi+")");
    $("#exampleModal").show();
  }else{
    document.getElementById('send').style.display = 'none';
    document.getElementById('save').removeAttribute("onclick");
    document.getElementById('save').setAttribute("onclick","LOGIN.borradorguardado("+aidi+")");
    document.getElementById('send').removeAttribute("onclick");
    document.getElementById('send').setAttribute("onclick","LOGIN.enviadosguardado("+aidi+")");
    $("#exampleModal").show();
  }

},seleccionado:function(){
  //funcion para que el usuario note cual bandeja tiene seleccionada (bandeja de enviados)
  debugger;
  if(cambio===true){
    $("#salida").removeClass("seleccionado");
    $("#borrador").addClass("seleccionado");
    cambio=false;
  }
},seleccionado2:function(){
  //funcion para que el usuario note cual bandeja tiene seleccionada (bandeja de salida)
  debugger;
  if(cambio===false){
    $("#salida").addClass("seleccionado");
    $("#borrador").removeClass("seleccionado");
    cambio=true;
  }
},seleccionado3:function(){
  //funcion para que el usuario note cual bandeja tiene seleccionada (bandeja de salida)
  debugger;
  if(cambio===false){
    $("#salida").addClass("seleccionado");
    $("#enviados").removeClass("seleccionado");
    cambio=true;
  }
},borradorguardado:function(aidi){
  //funcion para guardar los correos de la bandeja de enviados
 debugger;
 var destinatario = document.getElementById("paramsj").value;
 var asunto = document.getElementById("asuntomsj").value;
 var contenido = document.getElementById("contenidomsj").value;
 var useron=JSON.parse(localStorage.getItem("Online")).online;
 var borrador = "borrador";
 if(LOGIN.validarlightbox()){
    var actual=window.location.href;
    window.open('borrador/'+useron+'/'+destinatario+'/'+asunto+'/'+contenido+'/'+borrador+'/'+aidi);
    window.close(actual);
  }
  document.getElementById("paramsj").value ="";
  document.getElementById("asuntomsj").value ="";
  document.getElementById("contenidomsj").value ="";

}
  
}
