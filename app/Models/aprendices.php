<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    protected $table = "tblaprendices";
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
        'password'
        

    ];


    public $timestamps = false;
}
