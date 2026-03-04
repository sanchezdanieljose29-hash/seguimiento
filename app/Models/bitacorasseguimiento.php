<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bitacorasseguimiento extends Model
{
    protected $table = "tblbitacorasseguimiento";
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'BitacoraNumero',
        'Aprendiz_NIS',
        'ProgramaFormacion_NIS',
        'FichaCaracterizacion_NIS',
        'EnteConformador_NIS',
        'Instructor_NIS',
        'TipoAlternativa_NIS',
        'SubtipoAlternativa',
        'AfiliadoArl',
        'NivelRiesgo',
        'NivelRiesgoCorresponde',
        'CuentaConEPP',
        'FirmaAprendiz',
        'FirmaInstructor',
        'FirmaJefeInmediato', 
        'CreadoEn', 
        'ActualizadoEn'
    ];

    public $timestamps = false;

}