<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enviado extends Model
{
    protected $table = "enviados";

    protected $fillable = ['email', 'asunto', 'contenido']
}
