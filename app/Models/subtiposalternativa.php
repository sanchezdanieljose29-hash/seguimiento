<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subtiposalternativa extends Model
{
    protected $table = "tblsubtiposalternativa"; 
    protected $fillable = [
     'alternativaNIS', 'nombre'

    ];
}
