<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'email', 'max:255', 'unique:alunos,email'],
            'data_nascimento' => ['required', 'date'],
        ]);

        $aluno = Alunos::create($request->all());

        return response()->json([
            'message' => 'Aluno criado com sucesso',
            'data'    => $aluno
        ], 201);
    }

    public function index(Request $request)
    {
        $query = Alunos::query();

        if ($request->has('nome') && !empty($request->nome)) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->has('email') && !empty($request->email)) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $alunos = $query->get();
        return response()->json($alunos);
    }

    public function update(Request $request, int $id)
    {
        $aluno = Alunos::find($id);

        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'data_nascimento' => ['required', 'date'],
        ]);

        $aluno->update($request->all());

        return response()->json([
            'message' => 'Aluno atualizado com sucesso',
            'data'    => $aluno
        ], 200);
    }

    public function delete(int $id)
    {
        $aluno = Alunos::find($id);
        $aluno->delete();

        return response()->json([
            'response' => 200,
            'message'  => 'Aluno deletado com sucesso'
        ]);
    }

    public function buscarPorNome(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'min:2']
        ]);

        $alunos = Alunos::where('nome', 'like', '%' . $request->nome . '%')->get();

        return response()->json([
            'message' => 'Busca realizada com sucesso',
            'data' => $alunos,
            'total' => $alunos->count()
        ]);
    }

    public function buscarPorEmail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email']
        ]);

        $alunos = Alunos::where('email', 'like', '%' . $request->email . '%')->get();

        return response()->json([
            'message' => 'Busca realizada com sucesso',
            'data' => $alunos,
            'total' => $alunos->count()
        ]);
    }
}
