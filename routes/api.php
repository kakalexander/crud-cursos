<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AreaCursosController;
use App\Http\Controllers\MatriculasController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UsersController::class, 'store']);  
Route::get('/users', [UsersController::class, 'index']);
Route::put('/users/{id}', [UsersController::class, 'update']);
Route::delete('/users/{id}', [UsersController::class, 'delete']);

Route::post('/alunos', [AlunosController::class, 'store']);  
Route::get('/alunos', [AlunosController::class, 'index']);
Route::get('/alunos/buscar-por-nome', [AlunosController::class, 'buscarPorNome']);
Route::get('/alunos/buscar-por-email', [AlunosController::class, 'buscarPorEmail']);
Route::put('/alunos/{id}', [AlunosController::class, 'update']);
Route::delete('/alunos/{id}', [AlunosController::class, 'delete']);

Route::post('/area-cursos', [AreaCursosController::class, 'store']);  
Route::get('/area-cursos', [AreaCursosController::class, 'index']);
Route::put('/area-cursos/{id}', [AreaCursosController::class, 'update']);
Route::delete('/area-cursos/{id}', [AreaCursosController::class, 'delete']);

Route::post('/matriculas', [MatriculasController::class, 'store']);  
Route::get('/matriculas', [MatriculasController::class, 'index']);
Route::put('/matriculas/{id}', [MatriculasController::class, 'update']);
Route::delete('/matriculas/{id}', [MatriculasController::class, 'delete']);

