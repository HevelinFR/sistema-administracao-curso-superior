<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Professores;

class ProfessoresController extends Controller
{
    public function index(){
        $professores = Professores::all();

        return view('painel.professor', ['professores' => $professores]);
    }

    public function store(Request $request){

        $professores = new Professores;

        $professores->matricula = $request->matricula;
        $professores->nome = $request->nome;
        $professores->email = $request->email;

        $professores->save();

        return redirect('professor')->with('msg', 'Professor cadastrado com sucesso!');
    }

    public function edit($id){
        $professor = Professores::findOrFail($id);

        return view('painel.editProfessor', ['professor' => $professor]);
    }

    public function update(Request $request){
        Professores::findOrFail($request->id)->update($request->all());

        return redirect('professor')->with('msg', 'Professor editado com sucesso!');
    }



    public function destroy($id){

        Professores::findOrFail($id)->delete();

        return redirect('professor')->with('msg', 'Professor deletado com sucesso!');

    }
}
