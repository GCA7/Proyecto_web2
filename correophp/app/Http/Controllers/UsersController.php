<?php

namespace App\Http\Controllers;
use Crypt;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use Mail;
use App\Http\Requests\UserRequest;
use redirect;

class UsersController extends Controller
{
    //

public function create()
{
    return view('register');
}

public function insertar(UserRequest $request)
{
    echo $request->input('username');
    if($this->validacion($request->input('email'))){
    echo "funko";
    $user = new User;
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->password = Crypt::encrypt($request->input('password'));
    $user->save();
    $this->email($request->input('email')); 
    return view('login');
}
    
}   

public function validacion($mail)
{
    $results = DB::table('users')->get();

    foreach ($results as $value) {
        if($value->email == $mail)
        {
            echo "no funko :(";
            return false;
        }else{
            echo "funko";
            return true;
        }
        
    }
}

public function email($correo)
{
   #$data=[];
   #Mail::send('register', [ 'user'  =>  $data ], function ($msj) {
          # $msj->from('letterinfo@letter.com', 'Letter Inc');

           #$msj->to($correo)->subject('Favor ingrese al siguiente link para confirmar tu cuenta');
            #echo "Si funko";
    Mail($correo,'funke','correo','greivindca7@gmail.com');
#});
}

public function validarlogin(Request $request)
{
    $email = $request->input('log_email');
    $password = $request->input('log_pass');
    $results = DB::table('users')->get();
    foreach ($results as $value) {
        echo $passdecrypt = Crypt::decrypt($value->password);
        if($value->email == $email && $passdecrypt == $password){
            echo "si logueo";
            return view('correoprincipal');
        }else{
            echo "no logueo";
        }

    }


}
 
}


