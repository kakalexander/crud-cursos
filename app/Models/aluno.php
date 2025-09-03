<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    
    protected $table = 'aluno';

    protected $fillable = [
        'nome',
        'email',
        'data_de_nascimento',
    ];
}