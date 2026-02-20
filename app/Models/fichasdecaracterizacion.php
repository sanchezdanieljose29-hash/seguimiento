<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    protected $table ="tblfichasdecaracterizacion";
    protected $fillable = [
        'codigo', 'Denominacion', 'Cupo', 'FechaInicio', 'FechaFin', 'Direccion', 'Observaciones'
    ];
    public $timestamps = false;
}


