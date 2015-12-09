<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Session;

class CategoriasController extends Controller{

  public function index(){
    $titulo =  "Categorias - ";
    $cat = \App\Categorias::all();
    return view('categorias.index', compact('titulo', 'cat'));
  }

  public function cadastro(){
    $cat = \App\Categorias::all();
    return view('categorias.cadastro', compact('cat'));
  }

  public function inserir(Request $request){
    $cat = $request->all();
    $validator = $this->validator($request->all());
    if ($validator->fails())
    {
      $this->throwValidationException(
        $request, $validator
      );
    }
    \App\Categorias::create([
        'titulo' => $cat['titulo'],
    ]);
    Session::flash('type', 'success');
    Session::flash('icon', 'check');
    Session::flash('message', 'Categoria cadastrada com sucesso!');
    return redirect('categorias');
  }

  public function validator(array $data){
    $messages = [
        'titulo.required' => 'Por favor digite uma categoria',
    ];
    return Validator::make($data, [
      'titulo' => 'required',
    ], $messages);
  }
}
