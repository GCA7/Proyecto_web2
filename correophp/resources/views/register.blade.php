@extends('layouts.principal')

@section ('title', 'Registrar Usuario')

@section('content')
<div class="container">
    <div class="col-md-12 register">
        <h1 class="letras">Crea tu cuenta de Letter</h1>
        <div class="row">
            <div class="col-md-4 visible-desktop visible-tablet">
                <section class="izquierda">
                    <p>Letter</p>
                    <p>The email app that's simple, smart and beautiful</p>
                    <img src="../img/mail.ico">
                </div>
            </br>
            <section class="iz">
               @if (count($errors) > 0)
               <div class="alert alert-danger animated bounceInLeft" style="color:gray;" role="alert">
                <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{$error}}</li>
                   @endforeach
               </ul>
           </div>
           @endif
       </section>
   </section>
   <div class="derecha col-md-6">
    <form name="form_registro" method="POST" action="{{asset('registro')}}">
        <header class="pr"><h1>Registro</h1></header> </br>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user"></span></span>
            <input type="text" class="form-control" placeholder="UserName" aria-describedby="basic-addon1" id="usuario" name="username" required>
        </div>
    </br>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Email" id="email" name="email" aria-describedby="basic-addon2" required pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
        <span class="input-group-addon" id="basic-addon2"></span>
    </div>
</br>
<div class="input-group">
    <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-lock"></span></span>
    <input type="password" class="form-control" placeholder="Password" id="contrasena" aria-describedby="basic-addon1" name="password" required>
</div>
</br>
</br>
<select name="sex-option" id="sexo" class="tamano">
    <option  value="Hombre">Hombre</option>
    <option  value="Mujer">Mujer</option>
</select> </br> </br>
<p class="text">
    <input type="checkbox" id="checkterm" name="terms" value="Terminos"/> 
    Acepto las Condiciones del Servicio 
    y la Politica de Privacidad de Letter.
</p>
</br>
<button class="boton sombra" type="submit" target="_blank">Acceder </button> 
<button class="boton sombra" type="submit" href='login' >Cancelar </button> </br>
</form>
</div>
</div>
</div>
@stop