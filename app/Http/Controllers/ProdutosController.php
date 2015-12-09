<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Produtos;
use Session;
use Validator;

class ProdutosController extends Controller{

    public function index(){
      $titulo = "Produtos - ";
      $produtos = Produtos::all();
      return view('produtos.index', compact('produtos', 'titulo'));
    }

    public function cadastro(){
      $titulo =  "Cadastrando Produtos - ";
      $produtos = Produtos::all();
      return view('produtos.cadastro', compact('titulo', 'produtos'));
    }

    // função para cadastrar um novo produto
    public function inserir(Request $request){
      $produtos = $request->all();
  		$validator = $this->validator($request->all());
  		if ($validator->fails())
  		{
  			$this->throwValidationException(
  				$request, $validator
  			);
  		}
  		Produtos::create([
  				'descricao' => $produtos['descricao'],
  				'slug' => str_slug($produtos['descricao'], "-"),
  				'preco' => $produtos['preco'],
  				'qtdade' => $produtos['qtdade'],
          'obs' => $produtos['obs'],
      ]);
      Session::flash('type', 'success');
      Session::flash('icon', 'check');
  		Session::flash('message', 'Produto cadastrado com sucesso!');
  		return redirect('produtos');
    }

    public function editar($id){
      $titulo = "Editando Produto - ";
      $produtos  = Produtos::all();
      $prod  = Produtos::find($id);
      return view('produtos.editar', compact('produtos', 'titulo', 'prod'));
    }

    //função para atualizar o produto
    public function atualizar(Request $request){
      $produtos = $request->all();
  		$validator = $this->validator_editar($request->all());
  		if ($validator->fails())
  		{
  			$this->throwValidationException(
  				$request, $validator
  			);
  		}
  		Produtos::where('id', $produtos['put'])->update([ 'descricao' => $produtos['descricao'],
      'slug' => str_slug($produtos['descricao'], "-"),
      'preco' => $produtos['preco'],
      'qtdade' => $produtos['qtdade'],
      'obs' => $produtos['obs']
      ]);
      Session::flash('type', 'success');
      Session::flash('icon', 'check');
  		Session::flash('message', 'Produto atualizado com sucesso!');
  		return redirect('produtos');
    }

    // funçao para validar os dados do cadastro de produtos
    public function validator(array $data){
      $messages = [
          'descricao.required' => 'Por favor digite uma descrição',
          'preco.required' => 'Por favor digite um preço',
          'qtdade.required' => 'Por favor digite uma quantidade',
      ];
  		return Validator::make($data, [
  			'descricao' => 'required|max:255',
  			'preco' => 'required',
  			'qtdade' => 'required',
  		], $messages);
  	}

    //função para excluir produto
    public function excluir($id){
  		$produtos = Produtos::find($id);
			Produtos::destroy($id);
      Session::flash('type', 'success');
      Session::flash('icon', 'check');
			Session::flash('message', 'Produto excluir com successo!');
			return redirect('produtos');
  	}

    // funçao para validar os dados do cadastro de produtos
    public function validator_editar(array $data){
      $messages = [
          'descricao.required' => 'Por favor digite uma descrição',
          'preco.required' => 'Por favor digite um preço',
          'qtdade.required' => 'Por favor digite uma quantidade',
      ];
  		return Validator::make($data, [
  			'descricao' => 'required|max:255',
  			'preco' => 'required',
  			'qtdade' => 'required',
  		], $messages);
  	}
}
