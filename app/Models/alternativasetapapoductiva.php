<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alternativasetapapoductiva extends Model
{
    protected $table ="tblalternativasetapapoductiva";

    protected $fillable = [

    'NIS', 'Denominación', 'descripcion', 'estado'

    ];

    public $timestamps = false;
}
