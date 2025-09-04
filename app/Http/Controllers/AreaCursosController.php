<?php

namespace App\Http\Controllers;

use App\Models\AreaCursos;
use Illuminate\Http\Request;

class AreaCursosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string', 'max:1000'],
        ]);

        $areaCurso = AreaCursos::create($request->all());

        return response()->json([
            'message' => 'Area curso criada com sucesso',
            'data' => $areaCurso
        ], 201);
    }

    public function index()
    {
        $areaCursos = AreaCursos::all();
        return response()->json($areaCursos);
    }

    public function update(Request $request, int $id)
    {
        $areaCurso = AreaCursos::find($id);

        $request->validate([
            'titulo' => ['required', 'string', 'max:255'],
            'descricao' => ['required', 'string', 'max:1000'],
        ]);

        $areaCurso->update($request->all());

        return response()->json([
            'message' => 'Area curso atualizada com sucesso',
            'data' => $areaCurso
        ], 200);
    }

    public function delete(int $id)
    {
        $areaCurso = AreaCursos::find($id);
        $areaCurso->delete();

        return response()->json([
            'response' => 200,
            'message' => 'Area curso deletada com sucesso'
        ]);
    }

}
