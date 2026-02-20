<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiposdocumentos extends Model
{
    protected $table = "tbltiposdocumentos";
    protected $primaryKey = 'NIS';
    protected $fillable = [
    'Denominacion', 'Observaciones'

    ];
    public $timestamps = false;
}
