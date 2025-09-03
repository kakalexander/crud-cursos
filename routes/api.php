<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\AreaCursosController;
use App\Http\Controllers\MatriculasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);  
Route::get('/users', [UserController::class, 'index']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);

Route::post('/alunos', [AlunosController::class, 'store']);  
Route::get('/alunos', [AlunosController::class, 'index']);
Route::put('/alunos/{id}', [AlunosController::class, 'update']);
Route::delete('/alunos/{id}', [AlunosController::class, 'delete']);

Route::post('/areas-cursos', [AreaCursosController::class, 'store']);  
Route::get('/areas-cursos', [AreaCursosController::class, 'index']);
Route::put('/areas-cursos/{id}', [AreaCursosController::class, 'update']);
Route::delete('/areas-cursos/{id}', [AreaCursosController::class, 'delete']);

Route::post('/matriculas', [MatriculasController::class, 'store']);  
Route::get('/matriculas', [MatriculasController::class, 'index']);
Route::put('/matriculas/{id}', [MatriculasController::class, 'update']);
Route::delete('/matriculas/{id}', [MatriculasController::class, 'delete']);

