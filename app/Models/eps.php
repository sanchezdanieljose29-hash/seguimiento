<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eps extends Model
{

protected $table ="tbleps";
protected $primaryKey = 'NIS';
    protected $fillable = [
        'Numdoc', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;
}
