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
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('area_curso_id');
            $table->timestamps();
            $table->foreign('aluno_id')->references('id')->on('alunos')->onDelete('cascade');
            $table->foreign('area_curso_id')->references('id')->on('cursos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('matriculas', function (Blueprint $table) {
            $table->dropForeign(['aluno_id']);
            $table->dropForeign(['area_curso_id']);
        });

        Schema::dropIfExists('matriculas');
    }
};
