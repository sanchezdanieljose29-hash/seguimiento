<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class enteconformadores extends Model
{
    protected $table = "tblenteconformadores";
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'Tdoc', 'Ndoc', 'RazonSocial', 'Direccion', 'Telefono', 'CorreoInstitucional'
    ];
    public $timestamps = false;
    
}


