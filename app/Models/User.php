<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;

    protected $table = 'tblusuarios';
    protected $primaryKey = 'NIS';
    public $timestamps = false;


    protected $fillable = [
        'Tdoc',
        'Ndoc',
        'Nombres_Apellidos',
        'CorreoElectronico',
        'password_cifrado'
    ];

    protected $hidden = [
        'password_cifrado'
    ];

    protected $casts = [ // 👈 OPCIONAL pero recomendado
        'activo' => 'boolean',
        'FechaRegistro' => 'datetime',
        'UltimoAcceso' => 'datetime',
        'BloqueadoHasta' => 'datetime',
    ];

    

    // Relaciones (solo estas dos, la de roles sobra)
    public function aprendiz()
    {
        return $this->hasOne(aprendices::class, 'Usuarios_NIS', 'NIS');
    }

    public function instructor()
    {
        return $this->hasOne(instructores::class, 'Usuarios_NIS', 'NIS');
    }

}