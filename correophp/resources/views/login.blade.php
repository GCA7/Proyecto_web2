@extends('layouts.principal')

@section('content')
    <div>
        <section id="bloque1">
            <header>
            <a href="{{asset('/loguear')}}" class="btn btn-primary" id="button" name="btnlogin" type="submit">Log In</a>
            <a href="{{asset('/register')}}" class="link" name="btnsingin" type="submit">SING IN</a>
        </header>
            <h1>Letter</h1>
            <h3>The mail that works for you</h3>
        </section>

        <section class="shadow" id="bloque2">

        </section>

        <section class="shadow" id="bloque3">

            <h2>Enviar correos de manera sencilla</h2>

        </section>


        <section class="shadow" id="bloque4">

            <h2>Registro en sencillos pasos</h2>

        </section>
    </div>

@stop