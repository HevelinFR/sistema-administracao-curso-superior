<?php

use App\Http\Controllers\AlunosController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\ProfessoresController;
use App\Http\Controllers\TurmasController;
use App\Http\Controllers\AlunosTurmasController;
use App\Http\Controllers\Painel;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('painel.login');
});

Route::get('/home', [Painel::class, 'index']);

// Alunos
Route::get('/alunos', [AlunosController::class, 'index']);
Route::post('/adicionar-aluno', [AlunosController::class, 'store']);
Route::get('/alunos/edit/{id}', [AlunosController::class, 'edit']);
Route::put('/alunos/update/{id}', [AlunosController::class, 'update']);
Route::delete('/alunos/{id}', [AlunosController::class, 'destroy']);

Route::get('/adicionar-aluno', function(){
    return view('painel.addAluno');
});

//Disciplina
Route::get('/disciplina', [DisciplinaController::class, 'index']);
Route::post('/adicionar-disciplina', [DisciplinaController::class, 'store']);
Route::get('/disciplina/edit/{id}', [DisciplinaController::class, 'edit']);
Route::put('/disciplina/update/{id}', [DisciplinaController::class, 'update']);
Route::delete('/disciplina/{id}', [DisciplinaController::class, 'destroy']);

Route::get('/disciplina/adicionar', function(){
    return view('painel.addDisciplina');
});


//Professes
Route::get('/professor', [ProfessoresController::class, 'index']);
Route::post('/adicionar-professor', [ProfessoresController::class, 'store']);
Route::get('/professor/edit/{id}', [ProfessoresController::class, 'edit']);
Route::put('/professor/update/{id}', [ProfessoresController::class, 'update']);
Route::delete('/professor/{id}', [ProfessoresController::class, 'destroy']);

Route::get('/adicionar-professor', function(){
    return view('painel.addProfessor');
});


//Turmas
Route::get('/turmas', [TurmasController::class, 'index']);

Route::get('/adicionar-turma',  [TurmasController::class, 'redir_registration']);
Route::post('/adicionar-turma',  [TurmasController::class, 'store']);

Route::get('/turma/edit/{id}', [TurmasController::class, 'edit']);
Route::put('/turma/update/{id}', [TurmasController::class, 'update']);
Route::delete('/turma/{id}', [TurmasController::class, 'destroy']);

Route::get('/matricula', [AlunosTurmasController::class, 'index']);
Route::post('/matricula',  [AlunosTurmasController::class, 'store']);