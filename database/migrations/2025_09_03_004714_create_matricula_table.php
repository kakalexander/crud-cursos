<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void 
    {
        Schema::create('matriculas', function (Blueprint $table) {
            $table->id();
            $table->unique(['aluno_id', 'area_curso_id']);
            $table->foreignId('aluno_id')->constrained('alunos')->cascadeOnDelete();
            $table->foreignId('area_curso_id')->constrained('area_cursos')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void 
    {
        Schema::dropIfExists('matriculas');
    }
};
