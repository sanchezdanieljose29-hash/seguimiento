<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    protected $table ="tblfichasdecaracterizacion";
    protected $primaryKey = 'NIS';
    protected $fillable = [
        'codigo', 'Denominacion', 'Cupo', 'FechaInicio', 'FechaFin', 'Direccion', 'Observaciones', 'tblprogramasdeformacion_NIS', 'tblcentrosdeformacion_NIS'
    ];
    public $timestamps = false;
}


