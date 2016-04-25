<?php

namespace App\Console\Commands;
use App\Salida;
use App\Enviado;
use DB;
use Illuminate\Console\Command;
use Cache;
use Mail;
use redirect;
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $enviado = new Enviado();
        #$user = Cache::get('usuario');
        $correos= DB::table('salidas')->select('id', 'email', 'asunto', 'destinatario', 'contenido')->get();
        if($correos != null){
                foreach ($correos as $correo) {
                    #$correo->enviarcorreos($correo);
                    $enviado->email= $correo->email;
                    $enviado->destinatario = $correo->destinatario;
                    $enviado->asunto = $correo->asunto;
                    $enviado->contenido = $correo->contenido;
                    $enviado->estado = true;
                    $enviado->save();
                }
          $this->info('Se han enviando todos los correos');      
        }
        else{
            $this->info('No hay correos pendientes');   
        }
    }
}
