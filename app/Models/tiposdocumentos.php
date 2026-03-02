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

     // La relación inversa (opcional pero recomendada)
    public function aprendices()
    {
        return $this->hasMany(aprendices::class, 'tbltiposdocumentos_NIS', 'NIS');
    }
    // 👇 DEFINIR LA RELACIÓN (esto es lo MÁS IMPORTANTE)
    public function tipoDocumento()
    {
        return $this->belongsTo(
            tiposdocumentos::class,  // Modelo relacionado
            'tbltiposdocumentos_NIS', // FK en tabla aprendices
            'NIS'                    // PK en tabla tipos_documento
        );
    }
}
