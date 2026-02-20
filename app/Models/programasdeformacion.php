<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class programasdeformacion extends Model
{
    protected $table = "tblprogramasdeformacion"; 
    protected $primaryKey = 'NIS'; 
    protected $fillable = [
        'codigo', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;
}


