<?php

namespace App\Http\Controllers;

use App\Models\Matriculas;
use Illuminate\Http\Request;

class MatriculasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'aluno_id'      => ['required', 'integer', 'exists:alunos,id'],
            'area_curso_id' => ['required', 'integer', 'exists:area_cursos,id'],
        ]);

        $matriculaExistente = Matriculas::where('aluno_id', $request->aluno_id)
            ->where('area_curso_id', $request->area_curso_id)
            ->first();

        if ($matriculaExistente) {
            return response()->json([
                'message' => 'Este aluno já está matriculado neste curso',
                'error' => 'Matrícula duplicada'
            ], 422);
        }

        $matricula = Matriculas::create($request->all());

        return response()->json([
            'message' => 'Matrícula criada com sucesso',
            'data'    => $matricula
        ], 201);
    }

    public function index()
    {
        $matriculas = Matriculas::with(['aluno', 'areaCurso'])->get();
        return response()->json($matriculas);
    }

    public function update(Request $request, int $id)
    {
        $matricula = Matriculas::find($id);

        if (!$matricula) {
            return response()->json([
                'message' => 'Matrícula não encontrada'
            ], 404);
        }

        $request->validate([
            'aluno_id'      => ['required', 'integer', 'exists:alunos,id'],
            'area_curso_id' => ['required', 'integer', 'exists:area_cursos,id'],
        ]);

        $matriculaExistente = Matriculas::where('aluno_id', $request->aluno_id)
            ->where('area_curso_id', $request->area_curso_id)
            ->where('id', '!=', $id)
            ->first();

        if ($matriculaExistente) {
            return response()->json([
                'message' => 'Este aluno já está matriculado neste curso',
                'error' => 'Matrícula duplicada'
            ], 422);
        }

        $matricula->update($request->all());

        return response()->json([
            'message' => 'Matrícula atualizada com sucesso',
            'data'    => $matricula
        ], 200);
    }

    public function delete(int $id)
    {
        $matricula = Matriculas::find($id);

        if (!$matricula) {
            return response()->json([
                'message' => 'Matrícula não encontrada'
            ], 404);
        }

        $matricula->delete();

        return response()->json([
            'message' => 'Matrícula deletada com sucesso'
        ], 200);
    }
}
