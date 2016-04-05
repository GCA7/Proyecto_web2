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
            return redirect('/login');
        }
        
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
   #$data=[];
   #Mail::send('register', [ 'user'  =>  $data ], function ($msj) {
          # $msj->from('letterinfo@letter.com', 'Letter Inc');

           #$msj->to($correo)->subject('Favor ingrese al siguiente link para confirmar tu cuenta');
            #echo "Si funko";
        Mail($correo,'funke','correo','greivindca7@gmail.com');
#});
    }

   public function Login(Request $request){
    $user= DB::table('users')->select('password', 'email', 'estado')->where('email',$request->input("log_email"))->get();
    foreach ($user as $user) {
      $contraseña= Crypt::decrypt($user->password);
      if ($user->estado==0){
        echo "No has activado tu cuenta";
      }else{
      if ($contraseña == $request->input("log_pass") && $user->email == $request->input("log_email") ){
        #Cache::add('user',$request->input("email"),60);
        echo "funcko";
            return redirect('/correoprincipal');
      }else{
        echo "usuario o contraseña incorrecta";
      }
    }
    }
  }

    public function activaruser(Request $request)
    { 
    DB::table('users')->where('email', $request->input('email'))->update(['estado' => true]);
        return redirect('/loguear'); 
}

}


