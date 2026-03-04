<?php

use Illuminate\Foundation\Auth\User as Authenticatable;

class usuarios extends Authenticatable
{
    protected $table = 'tblusuarios';

    protected $fillable = [
        'Ndoc',
        'password',
        'roles'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    // 👇 Esto le dice a Laravel que el campo login es Ndoc
    public function getAuthIdentifierName()
    {
        return 'Ndoc';
    }
}
