<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Salida;
use App\Enviado;
use App\Http\Requests;
use Cache;
use Mail;
use redirect;
class Cron extends Controller
{
    //
    public function handle()
    {
        $obj_correo = new Salida();
        $enviado = new Enviado();
        $user = Cache::get('usuario');
        $correos= DB::table('salidas')->select('id', 'email', 'asunto', 'destinatario', 'contenido')->where('email', $user)->get();
        if($correos != null){
                foreach ($correos as $correo) {
                    $correo->enviarcorreos($correo);
                    $enviado->email= $usuario;
                    $enviado->destinatario = $para;
                    $enviado->asunto = $asunto;
                    $enviado->contenido = $contenido;
                    $enviado->estado = true;
                    $enviado->save();
                }
          $this->info('Se han enviando todos los correos');      
        }
        else{
            $this->info('No hay correos pendientes');   
        }
    }

public function enviarcorreos($correos) 
{
    $data=[];
   Mail::send('confirmacion', $data, function ($message) use ($correos){

    $message->subject($correos->asunto);

    $message->to($correo->contenido);

});

}
}
