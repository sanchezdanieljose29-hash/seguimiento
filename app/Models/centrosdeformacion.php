<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{

    protected $table = "tblcentrosdeformacion";
    protected $primaryKey = 'NIS';
    protected $fillable = [
        'NIS', 'codigo', 'Denominacion', 'Direccion', 'Observaciones', 'tblregionales_NIS'
    ];
    public $timestamps = false;
    
}
