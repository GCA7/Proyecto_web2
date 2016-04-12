<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table = "salidas";

    protected $fillable = ['email', 'para', 'asunto', 'contenido', 'estado'];
}
