<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alternativasetapapoductiva extends Model
{
    protected $table ="tblalternativasetapaproductiva";
    protected $primaryKey = 'NIS';

    protected $fillable = [

    'Denominacion', 'descripcion'

    ];

    public $timestamps = false;
}
