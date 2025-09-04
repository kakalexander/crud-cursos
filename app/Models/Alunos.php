<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    
    protected $table = 'alunos';

    protected $fillable = [
        'nome',
        'email',
        'data_nascimento',
    ];
}