<?php

namespace App\Console\Commands;
use App\Salida;
use App\Enviado;
use App\Borrador;
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
        $user = Cache::get('usuario');
        $correos= DB::table('salidas')->select('id', 'email', 'asunto', 'destinatario', 'contenido')->get();
        if($correos != null){
                foreach ($correos as $correo) {
                    #$this->enviarcorreos($correos);
                    $enviado->email= $correo->email;
                    $enviado->destinatario = $correo->destinatario;
                    $enviado->asunto = $correo->asunto;
                    $enviado->contenido = $correo->contenido;
                    $enviado->bandeja = 'enviado';
                    $enviado->estado = true;
                    $enviado->save();
                    $correos= DB::table('salidas')->select('id', 'email', 'asunto', 'destinatario', 'contenido')->where('email', $user)->delete();

                }
          $this->info('Letters enviados correctamente');      
        }
        else{
            $this->info('No hay correos pendientes');   
        }
    }
}
