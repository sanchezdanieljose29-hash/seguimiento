<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class evidenciasbitacoras extends Model
{
    protected $table = 'tblevidenciasbitacoras';
    protected $primaryKey = 'NIS';
    protected $fillable = [

        'FechaInicioActividad',
        'FechaFinActividad',
        'DescripcionActividad',
        'EvidenciaCumplimiento',
        'Observaciones',
        'bitacora_NIS',
        'tblbitacorasseguimiento_NIS'
    ];

    public $timestamps = false;
}
