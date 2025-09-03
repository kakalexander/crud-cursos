<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    
    protected $table = 'matricula';

    protected $fillable = [
        'matricula',
        'aluno_id',
        'areaCurso_id',
    ];
}