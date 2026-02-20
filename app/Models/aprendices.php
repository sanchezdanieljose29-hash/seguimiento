<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    protected $table = "tblaprendices"; 
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'tbltiposdocumentos_NIS', 'Ndoc', 'Nombres', 'Apellidos', 'Direccion', 'Telefono', 'CorreoInstitucional', 'CorreoPersonal', 'Sexo', 'FechaNac', 'tbleps_NIS'


    ];

    public $timestamps = false;
}
