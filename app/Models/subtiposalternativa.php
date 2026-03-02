<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subtiposalternativa extends Model
{
    protected $table = "tblsubtiposalternativa";
    protected $primaryKey = "NIS";
    protected $fillable = [
        'alternativaNIS',
        'nombre'

    ];
    public $timestamps = false;

     // 👇 DEFINIR LA RELACIÓN (esto es lo MÁS IMPORTANTE)
    public function alternativa()
    {
        return $this->belongsTo(
            alternativasetapapoductiva::class,  // Modelo relacionado
            'alternativaNIS', // FK en tabla aprendices
            'NIS'                    // PK en tabla de tabla de alternativasetapasproductiva
        );
    }
}
