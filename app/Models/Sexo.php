<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = "tblsexos"; 
    protected $primaryKey = 'NIS'; 
    protected $fillable = [
        'Nombre'
    ];
    public $timestamps = false;
}
