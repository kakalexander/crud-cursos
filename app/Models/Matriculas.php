<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    
    protected $table = 'matriculas';

    protected $fillable = [
        'matricula',
        'aluno_id',
        'area_curso_id',
    ];
}