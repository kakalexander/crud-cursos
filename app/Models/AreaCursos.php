<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaCursos extends Model
{
    protected $table = 'area_cursos';

    protected $fillable = [
        'titulo',
        'descricao',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];
}
