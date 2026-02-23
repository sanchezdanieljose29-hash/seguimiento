<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Model
{
    protected $table = "tblrolesadministrativos";
    protected $primaryKey = 'NIS';
    protected $fillable = [
'Descripcion'

    ];
    public $timestamps = false;
}
