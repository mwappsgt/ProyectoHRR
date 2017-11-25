<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class habitacion extends Model
{
    protected $table = "habitacion";

    protected $fillable = [
        'numero', 'tipo', 'des', 'extra','camas','precio','tamanio','id_hotel'
    ];

}
