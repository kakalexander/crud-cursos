<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matriculas extends Model
{

    protected $table = 'matriculas';

    protected $fillable = [
        'aluno_id',
        'area_curso_id',
    ];

    protected $casts = [
        'aluno_id' => 'integer',
        'area_curso_id' => 'integer',
    ];

    public function aluno()
    {
        return $this->belongsTo(Alunos::class, 'aluno_id');
    }

    public function areaCurso()
    {
        return $this->belongsTo(AreaCursos::class, 'area_curso_id');
    }
}
