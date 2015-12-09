<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Validator;

class ClientesController extends Controller{

  public function index(){
    $titulo = "Clientes - ";
    $clientes = \App\Clientes::all();
    return view('clientes.index', compact('titulo', 'clientes'));
  }

  public function cadastro(){
    $titulo = "Cadastro de Clientes - ";
    $clientes = \App\Clientes::all();
    return view('clientes.cadastro', compact('titulo', 'clientes'));
  }

  // função para cadastrar um novo cliente
  public function inserir(Request $request){
    $clientes = $request->all();
    $validator = $this->validator($request->all());
    if ($validator->fails())
    {
      $this->throwValidationException(
        $request, $validator
      );
    }
    \App\Clientes::create([
        'nome' => $clientes['nome'],
        'endereco' => $clientes['endereco'],
        'telefone' => $clientes['telefone'],
        'cpf' => $clientes['cpf'],
        'obs' => $clientes['obs'],
    ]);
    Session::flash('type', 'success');
    Session::flash('icon', 'check');
    Session::flash('message', 'Cliente cadastrado com sucesso!');
    return redirect('clientes');
  }

  // funçao para validar os dados do cadastro de clientes
  public function validator(array $data){
    $messages = [
        'nome.required' => 'Por favor digite um nome',
        'endereco.required' => 'Por favor digite um endereço',
        'telefone.required' => 'Por favor digite um telefone',
        'cpf.required' => 'Por favor digite um CPF',
    ];
    return Validator::make($data, [
      'nome' => 'required',
      'endereco' => 'required',
      'telefone' => 'required',
      'cpf' => 'required',
    ], $messages);
  }

  public function editar($id){
    $titulo = "Editando Produto - ";
    $produtos  = Produtos::all();
    $prod  = Produtos::find($id);
    return view('produtos.editar', compact('produtos', 'titulo', 'prod'));
  }

  //função para excluir cliente
  public function excluir($id){
    $produtos = \App\Clientes::find($id);
    \App\Clientes::destroy($id);
    Session::flash('type', 'success');
    Session::flash('icon', 'check');
    Session::flash('message', 'Cliente excluir com successo!');
    return redirect('clientes');
  }

}
