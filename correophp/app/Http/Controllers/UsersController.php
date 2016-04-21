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
use App\Salida;
use App\Borrador;
use Cache;
class UsersController extends Controller
{
    //

    public function create()
    {
        return view('register');
    }

    public function insertar(UserRequest $request)
    {
        #if($this->validacion($request->input('email'))){
        $user = new User;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Crypt::encrypt($request->input('password'));
        $user->save();
        $this->email($request->input('email'));
        return redirect('login'); 
        #}  
    }

    public function validacion($mail)
    {
        $results = DB::table('users')->get();

        foreach ($results as $value) {
            if($value->email == $mail)
            {
                return false;
            }else{
                return true;
            }
            
        }
    }

    public function email($correo)
    {
     $data=[];
   Mail::send('confirmacion', $data, function ($message) use ($correo){

    $message->subject('confirmacion ');

    $message->to($correo);
});
        #Mail($correo,'funke','correo','greivindca7@gmail.com');
 }

 public function Login(Request $request){
    $user= DB::table('users')->select('password', 'email', 'estado')->where('email',$request->input("log_email"))->get();
    foreach ($user as $user) {
      $contraseña= Crypt::decrypt($user->password);
      if ($user->estado==0){
        return view('loguear', ['error' => 'No has activado tu cuenta, favor revisa tu correo']);
    }else{
      if ($contraseña == $request->input("log_pass") && $user->email == $request->input("log_email") ){
        Cache::add('usuario',$request->input("log_email"),60);
        echo "funcko";
        return redirect('/correoprincipal');
    }else{
        echo "string";
        return view('loguear', ['error' => 'Usuario o contraseña incorrecta']);
    }
}
}
}

public function activaruser(Request $request)
{ 
    DB::table('users')->where('email', $request->input('email'))->update(['estado' => true]);
    return redirect('/loguear'); 
}

public function nuevocorreo($usuario, $para, $asunto, $contenido, $bandeja)
{
    $salidas = new Salida;
    $salidas->email= $usuario;
    $salidas->destinatario = $para;
    $salidas->asunto = $asunto;
    $salidas->contenido = $contenido;
    $salidas->estado = true;
    $salidas->bandeja = $bandeja;
    $salidas->save();
    return redirect('correoprincipal'); 
}

public function cargarcorreossalida() {
    $user = Cache::get('usuario');
    $correos= DB::table('salidas')->select('id', 'email', 'asunto', 'destinatario', 'contenido', 'bandeja')->where('email', $user)->get();
    return view('correoprincipal', ['correos' => $correos]);
}

public function nuevoguardado($usuario, $destinatario, $asunto, $contenido, $bandeja)
{
    echo "string";
    $salidas = new Borrador;
    $salidas->email= $usuario;
    $salidas->destinatario = $destinatario;
    $salidas->asunto = $asunto;
    $salidas->contenido = $contenido;
    $salidas->estado = false;
    $salidas->bandeja = $bandeja;
    $salidas->save();
    return redirect('correoprincipal'); 
}

public function cargarcorreosborrador() 
{
    $user = Cache::get('usuario');
    $correos= DB::table('borradores')->select('id', 'email', 'asunto', 'destinatario', 'contenido', 'bandeja')->where('email', $user)->get();
    return view('correoprincipal', ['correos' => $correos]);
}

public function nuevoenviado($usuario, $destinatario, $asunto, $contenido)
{
    $salidas = new Enviado;
    $salidas->email= $usuario;
    $salidas->destinatario = $destinatario;
    $salidas->asunto = $asunto;
    $salidas->contenido = $contenido;
    $salidas->estado = true;
    $salidas->save();
    return redirect('correoprincipal'); 
}

public function eliminarcorreo($id, $bandeja)
{
    $user = Cache::get('usuario');
    if($bandeja=='salida'){
    $correos= DB::table('salidas')->where('id', '=',$id)->delete();
    return redirect('correoprincipal');
    }else if($bandeja=='borrador'){
    $correos= DB::table('borradores')->where('id', '=',$id)->delete();
    return redirect('correoprincipal');
    } 
}

public function editarcorreos($id, $destinatario, $asunto, $contenido)
{
    $user = Cache::get('usuario');
    DB::table('salidas')
            ->where('id', $id)
            ->update(['destinatario' => $para,'asunto'=> $asunto,'contenido'=>$contenido]);
}
}


