<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Skill;
use Validator;
use Session;

class SkillController extends Controller{

    public function getIndex(){
        $titulo = "Skill cadastradas";
        $skill = Skill::all();
        return view('skill.index', compact('titulo', 'skill'));
    }

    public function getCadastro(){
        $titulo = "Cadastro de skill";
        return view('skill.cadastro', compact('titulo'));   
    }

    public function postInserir(Request $request){
        $validator = $this->validator($request->all());
        if ($validator->fails()) { $this->throwValidationException($request, $validator); }
        Skill::create([
            'titulo'        =>  $request->titulo,
            'porcentagem'   =>  $request->porcentagem
        ]);
        Session::flash('type', 'success');
        Session::flash('icon', 'check');
        Session::flash('message', 'Skill cadastrada com sucesso!');
        return redirect('skill');
    }

    public function validator(array $data){
      $messages = [
        'titulo.required' => 'Por favor digite um Titulo',
        'porcentagem.required' => 'Por favor digite uma porcentagem',
      ];
        return Validator::make($data, [
        'titulo' => 'required|max:255',
        'porcentagem' => 'required|max:255',
        ], $messages);
    }

    public function getEditar($id){
        $titulo = "Editando Skill";
        $skill = Skill::find($id);  
        return view('skill.editar', compact('titulo', 'skill')); 
    }

    public function postUpdate(Request $request){
        $validator = $this->validator($request->all());
        if ($validator->fails()) { $this->throwValidationException($request, $validator); }
        Skill::where('id', $request['put'])->update([
            'titulo'        =>  $request->titulo,
            'porcentagem'   =>  $request->porcentagem,
        ]);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Skill atualizada com sucesso');
        return redirect('skill');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getExcluir($id){
        Skill::destroy($id);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Skill deletada com sucesso');
        return redirect('skill');
    }
}
