<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aprendices extends Model  // 👈 PascalCase por convención
{
    protected $table = 'tblaprendices';
    protected $primaryKey = 'Usuarios_NIS';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'int';

    protected $fillable = [
        'Usuarios_NIS',
        'Ficha_NIS',
        'Direccion',
        'Telefono',
        'CorreoInstitucional',
        'CorreoPersonal',      // 👈 estaba en tu tabla pero faltaba aquí
        'Sexo',
        'FechaNac',
        'Eps_NIS',             // 👈 corregido, antes tenías tbleps_NIS y EPS_NIS duplicado
    ];

    // Relaciones
    public function usuario()
    {
        return $this->belongsTo(User::class, 'Usuarios_NIS', 'NIS');
    }

    public function ficha()
    {
        return $this->belongsTo(fichasdecaracterizacion::class, 'Ficha_NIS', 'NIS');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'Sexo', 'NIS');
    }

    public function eps()
    {
        return $this->belongsTo(Eps::class, 'Eps_NIS', 'NIS'); // 👈 relación faltante
    }
}