<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Alunos;

class AlunosController extends Controller
{
    public function index(){
        $alunos = Alunos::all();

        return view('painel.aluno', ['alunos' => $alunos]);
    }

    public function store(Request $request){

        $aluno = new Alunos;

        $aluno->matricula = $request->matricula;
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;

        $aluno->save();

        return redirect('alunos')->with('msg', 'Aluno cadastrado com sucesso!');
    }

    public function edit($id){
        $aluno = Alunos::findOrFail($id);

        return view('painel.editAluno', ['aluno' => $aluno]);
    }

    public function update(Request $request){
        Alunos::findOrFail($request->id)->update($request->all());

        return redirect('alunos')->with('msg', 'Aluno editado com sucesso!');
    }



    public function destroy($id){

        Alunos::findOrFail($id)->delete();

        return redirect('alunos')->with('msg', 'Aluno deletado com sucesso!');

    }
}