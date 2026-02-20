<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class regionales extends Model
{

protected $table = 'tblregionales';
protected $primaryKey = 'NIS';
protected $keyType = 'int'; // o 'int' según sea el caso

    protected $fillable = [
        'codigo',
        'Denominacion',
        'Observaciones',
        'password'
    ];

    

    public $timestamps = false;
}

