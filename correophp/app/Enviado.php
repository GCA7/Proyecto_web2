<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enviado extends Model
{
    protected $table = "enviados";

    protected $fillable = ['email', 'para', 'asunto', 'contenido', 'estado', 'bandeja'];
}
