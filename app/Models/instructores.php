<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructores extends Model  // 👈 PascalCase
{
    protected $table = 'tblinstructores';
    protected $primaryKey = 'Usuarios_NIS';  // 👈 corregido, tu PK es Usuarios_NIS
    public $incrementing = false;            // 👈 no es autoincremental
    public $timestamps = false;
    protected $keyType = 'int';

    protected $fillable = [
        'Usuarios_NIS',          // 👈 agregado, es la FK/PK
        'Nombres',               // 👈 faltaba, existe en tu tabla
        'Apellidos',             // 👈 faltaba, existe en tu tabla
        'Direccion',
        'Telefono',
        'CorreoInstitucional',
        'CorreoPersonal',        // 👈 faltaba, existe en tu tabla
        'Sexo',
        'FechaNac',
        'Eps_NIS',               // 👈 corregido, antes era tbleps_NIS
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuarios_NIS', 'NIS');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'Sexo', 'NIS');
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class, 'Eps_NIS', 'NIS');
    }
}