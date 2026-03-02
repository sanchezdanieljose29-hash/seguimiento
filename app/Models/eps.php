<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class eps extends Model
{

protected $table ="tbleps";
protected $primaryKey = 'NIS';
    protected $fillable = [
        'NIT', 'Denominacion', 'Observaciones'
    ];
    public $timestamps = false;

     // La relación inversa (opcional pero recomendada)
    public function aprendices()
    {
        return $this->hasMany(aprendices::class, 'tbleps_NIS', 'NIS');
    }
}
