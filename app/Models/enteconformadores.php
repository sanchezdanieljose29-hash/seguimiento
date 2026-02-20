<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enteconformadores extends Model
{
    protected $table = "tblenteconformadores";

    protected $fillable = [
        'TipoDoc', 'Ndoc', 'RazonSocial', 'Direccion', 'Telefono', 'CorreoInstitucional'
    ];
    public $timestamps = false;
    
}
