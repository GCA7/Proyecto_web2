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

Route::get('loguear', function () {
   return view('loguear');
});

Route::get('confirmacion', function () {
   return view('confirmacion');
});

Route::post('registro', 'UsersController@insertar');

Route::post('loguear', 'UsersController@Login');

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


