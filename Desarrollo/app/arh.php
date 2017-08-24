<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class arh extends Model
{
    protected $table = "arh";

    protected $fillable = [
        'en', 'fechain', 'fechaout','id_reservacion','id_habitacion'
    ];

}
