<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
   return view('register');
});

Route::get('correoprincipal', function () {
   return view('correoprincipal');
});

Route::get('borrador', function () {
   return view('correoprincipal');
});

Route::get('loguear', function () {
   return view('loguear');
});

Route::get('loguear', function () {
   return view('loguear', ['error' => '']);});

Route::get('confirmacion', function () {
   return view('confirmacion');
});

Route::post('registro', 'UsersController@insertar');

Route::post('loguear', 'UsersController@Login');

Route::post('activar', 'UsersController@activaruser');

Route::get('correoprincipal/{usuario}/{para}/{asunto}/{contenido}/{bandeja}/{id}', 'UsersController@nuevocorreo');

Route::get('correoprincipal', function(){
	return view('correoprincipal', ['correos' => '', 'tipo' => '']);});

Route::get('principal', 'UsersController@cargarcorreossalida');

Route::get('borrador', 'UsersController@cargarcorreosborrador');

Route::get('enviados', 'UsersController@cargarcorreosenviado');

Route::get('borrador/{usuario}/{destinatario}/{asunto}/{contenido}/{bandeja}/{id}', 'UsersController@nuevoguardado');

Route::any('correoprincipal/{id}/{bandeja}', 'UsersController@eliminarcorreo');

Route::any('editar/{id}', 'UsersController@editarcorreo');

Route::any('correoprincipal/{id}/{usuario}/{destinatario}/{asunto}/{contenido}', 'UsersController@editarcorreo');



#Route::post('mail','MailController@email');




/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

    //


