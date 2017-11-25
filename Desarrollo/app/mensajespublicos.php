<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class habitacion extends Model
{
    protected $table = "mensajespublicos";

    protected $fillable = [
        'nombre', 'idReserva', 'mensaje','fecha','hora','estrellas'
    ];

}
