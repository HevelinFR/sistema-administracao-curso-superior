<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Turmas;
use App\Models\Professores;
use App\Models\Disciplina;
use App\Models\Alunos;

class TurmasController extends Controller
{
    public function index(){
        $turmas = Turmas::with('alunos', 'professores', 'disciplina')->get();

        return view('painel.turma', ['turmas' => $turmas]);
    }





    public function redir_registration(){
        $professores = Professores::all();
        $disciplinas = Disciplina::all();
        $alunos = Alunos::all();
        return view('painel.addTurma', ['professores' => $professores, 'disciplinas' => $disciplinas, 'alunos' => $alunos]);
    }

    public function store(Request $request){

        $turma = new Turmas();

        $turma->cod_turma = $request->cod_turma;
        $turma->semestre = $request->semestre;
        $turma->disciplina_id = $request->disciplina_id;
        $turma->professores_id = $request->professores_id;

        $turma->save();

        return redirect('turmas')->with('msg', 'Turma cadastrada com sucesso!');
    }

    public function edit($id){
        $turma = Turmas::findOrFail($id);
        $professores = Professores::all();
        $disciplinas = Disciplina::all();

        return view('painel.editTurma', ['turma' => $turma, 'professores' => $professores, 'disciplinas' => $disciplinas]);
    }

    public function update(Request $request){
        Turmas::findOrFail($request->id)->update($request->all());

        return redirect('turmas')->with('msg', 'Turma editada com sucesso!');
    }



    public function destroy($id){

        Turmas::findOrFail($id)->delete();

        return redirect('turmas')->with('msg', 'Turma deletaada com sucesso!');

    }
}