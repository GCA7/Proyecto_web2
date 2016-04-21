<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrador extends Model
{
    protected $table = "borradores";

    protected $fillable = ['email', 'para', 'asunto', 'contenido', 'estado', 'bandeja'];
}
