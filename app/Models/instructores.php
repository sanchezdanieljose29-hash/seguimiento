<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    protected $table = "tblinstructores";
    protected $primaryKey = 'NIS';
    protected $fillable = [

        'Nombres',
        'Apellidos',
        'tbltiposdocumentos_NIS',
        'Ndoc',
        'Direccion',
        'Telefono',
        'CorreoInstitucional',
        'CorreoPersonal',
        'Sexo',
        'FechaNac',
        'tbleps_NIS',
        'tblrolesadministrativos_NIS'
    ];

    public $timestamps = false;
}
