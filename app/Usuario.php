<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
        'nome', 'login', 'email', 'senha', 'cargo'
    ];

    protected $hidden = [
        'senha'
    ];
}
