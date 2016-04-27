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
    #funcion para insertar nuevos usuarios
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
    #funcion que valida que sea un usuario correcto
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
    #funcion que envia correos de confirmacion de registro
    public function email($correo)
    {
     $data=[];
   Mail::send('confirmacion', $data, function ($message) use ($correo){

    $message->subject('confirmacion ');

    $message->to($correo);
});
        #Mail($correo,'funke','correo','greivindca7@gmail.com');
 }
    #funcion para loguear usuario, y validar que lo pueda hacer
 public function Login(Request $request){
    $user= DB::table('users')->select('password', 'email', 'estado')->where('email',$request->input("log_email"))->get();
    foreach ($user as $user) {
      $contraseña= Crypt::decrypt($user->password);
      if ($user->estado==0){
        return view('loguear', ['error' => 'No has activado tu cuenta, favor revisa tu correo']);
    }else{
      if ($contraseña == $request->input("log_pass") && $user->email == $request->input("log_email") ){
        Cache::add('usuario',$request->input("log_email"),60);
        return redirect('/correoprincipal');
    }else{
        return view('loguear', ['error' => 'Usuario o contraseña incorrecta']);
    }
}
}
}
#funcion para activar la cuenta del usuario
public function activaruser(Request $request)
{ 
    DB::table('users')->where('email', $request->input('email'))->update(['estado' => 1]);
    return redirect('/loguear'); 
}
#funcion para insertar un nuevo correo en la bandeja de salida
public function nuevocorreo($usuario, $para, $asunto, $contenido, $bandeja, $id)
{
    if($id==='undefined'){
    $salida = new Salida;
    $salida->email= $usuario;
    $salida->destinatario = $para;
    $salida->asunto = $asunto;
    $salida->contenido = $contenido;
    $salida->estado = true;
    $salida->bandeja = $bandeja;
    $salida->save();
    }else{
    DB::table('salidas')
            ->where('id', $id)
            ->update(['destinatario' => $para,'asunto'=> $asunto,'contenido'=>$contenido]);
    }
    return redirect('correoprincipal'); 
}
    #funcion para cargar los correos que se encuentran en la bajdena de salida
public function cargarcorreossalida() {
    $user = Cache::get('usuario');
    $correos= DB::table('salidas')->select('id', 'email', 'asunto', 'destinatario', 'contenido', 'bandeja')->where('email', $user)->get();
    return view('correoprincipal', ['correos' => $correos, 'tipo' => 'LOGIN.cargasalida']);
}
    #funcion para insertar un correo en borrador
public function nuevoguardado($usuario, $destinatario, $asunto, $contenido, $bandeja, $id)
{
    if($id==='undefined'){
    $borrador = new Borrador;
    $borrador->email= $usuario;
    $borrador->destinatario = $destinatario;
    $borrador->asunto = $asunto;
    $borrador->contenido = $contenido;
    $borrador->estado = false;
    $borrador->bandeja = $bandeja;
    $borrador->save();
    }else{
        DB::table('borradores')
            ->where('id', $id)
            ->update(['destinatario' => $destinatario,'asunto'=> $asunto,'contenido'=>$contenido]);

    } 
    return redirect('correoprincipal');
}
    #funcion para cargar los correos que se encuentrar en borrador
public function cargarcorreosborrador() 
{
    $user = Cache::get('usuario');
    $correos= DB::table('borradores')->select('id', 'email', 'asunto', 'destinatario', 'contenido', 'bandeja')->where('email', $user)->get();
    return view('correoprincipal', ['correos' => $correos, 'tipo' => 'LOGIN.cargaborrador']);
}
    #funcion para insertar correos en la bandeja de enviados
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
    #funcion que permite eliminar correos
public function eliminarcorreo($id, $bandeja)
{
    $user = Cache::get('usuario');
    if($bandeja=='salida'){
    $correos= DB::table('salidas')->where('id', '=',$id)->delete();
    return redirect('principal');
    }else if($bandeja=='borrador'){
    $correos= DB::table('borradores')->where('id', '=',$id)->delete();
    return redirect('borrador');
    } else if($bandeja=='enviado'){
    $correos= DB::table('enviados')->where('id', '=',$id)->delete();
    return redirect('enviados');
    }
}
    #funcion que permite editar correos
public function editarcorreos($id, $destinatario, $asunto, $contenido)
{
    $user = Cache::get('usuario');
    DB::table('salidas')
            ->where('id', $id)
            ->update(['destinatario' => $para,'asunto'=> $asunto,'contenido'=>$contenido]);
}
#funcion para enviar correos
public function enviarcorreos($correos){
 $data=[];
   Mail::send('confirmacion', $data, function ($message) use ($correos){

    $message->subject($correos->asunto);

    $message->to($correos->email);
});
}
#funcion para cargar correos que estan en la bandeja de enviados
public function cargarcorreosenviado() {
    $user = Cache::get('usuario');
    $correos= DB::table('enviados')->select('id', 'email', 'asunto', 'destinatario', 'contenido', 'bandeja')->where('email', $user)->get();
    return view('correoprincipal', ['correos' => $correos, 'tipo' => 'LOGIN.cargaenviado']);
}


}


