<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    protected $table = "tblinstructores"; 
    protected $fillable = [
        'TipoDoc', 'Ndoc', 'RazonSocial', 'Direccion', 'Telefono', 'CorreoInstitucional'
    ];
    public $timestamps = false;
}
