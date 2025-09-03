<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    protected $table = 'areaCurso';

    protected $fillable = [
        'titulo',
        'descrição',
    
    ];

    protected $casts = [
        'data_de_nascimento' => 'date',
    ];
}
