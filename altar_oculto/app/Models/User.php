<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // permite usar factories

class User extends Authenticatable
{
    use HasFactory, Notifiable; // adiciona HasFactory para testes e Notifiable para notificações

    protected $table = 'usuarios'; // define nome da tabela

    // CAMPOS QUE PODEM SER PREENCHIDOS EM MASSA
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo',
    ];

    // CAMPOS OCULTOS
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
