<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Sessions;
use Redirect;
use App\Http\Requests;

class MailController extends Controller
{

public function email(Request $request)
{
	
	$email = $request->input('email');
	Mail::send('register', $request->all(), function($msj){
		$msj->subject('Correo de Contacto');
		$msj->to($user->email);
	});
	return Redirect::to('/login');
}


}
