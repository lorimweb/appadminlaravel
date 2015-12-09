<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Session;
use Auth;

class UsuariosController extends Controller{

    public function index(){
      $titulo = "Usuários - ";
      $usuarios = User::all();
      return view('usuarios.index', compact('usuarios', 'titulo'));
    }

    public function cadastro(){
      $titulo = "Cadastrando Usuários - ";
      $usuarios = User::all();
      return view('usuarios.cadastro', compact('usuarios', 'titulo'));
    }

    // função para cadastrar um novo usuário
    public function inserir(Request $request){
      $usuarios = $request->all();
  		$validator = $this->validator($request->all());
  		if ($validator->fails())
  		{
  			$this->throwValidationException(
  				$request, $validator
  			);
  		}
      $nivel = (isset($usuarios['nivel']) ? $usuarios['nivel'] : 0);
  		User::create([
  				'name' => $usuarios['name'],
          'endereco' => $usuarios['endereco'],
          'telefone' => $usuarios['telefone'],
  				'email' => $usuarios['email'],
  				'password' => bcrypt($usuarios['password']),
          'nivel' => $nivel,
  		]);
      Session::flash('type', 'success');
      Session::flash('icon', 'check');
  		Session::flash('message', 'Usuário cadastrado com sucesso!');
  		return redirect('usuarios');
    }

    // funçao para validar os dados do cadastro de usuários
    public function validator(array $data){
      $messages = [
          'name.required' => 'Por favor digite seu nome',
          'endereco.required' => 'Por favor digite seu endereço',
          'telefone.required' => 'Por favor digite seu telefone',
          'email.required' => 'Por favor digite seu email',
          'password.required' => 'Por favor digite sua senha',
      ];
  		return Validator::make($data, [
  			'name' => 'required|max:255',
  			'email' => 'required|email|max:255|unique:users',
  			'password' => 'required|confirmed|min:6',
        'endereco' => 'required|max:255',
        'telefone' => 'required|max:255',
  		], $messages);
  	}

    //função que carrega a view do perfil do usuário
    public function perfil(){
      $titulo = "Perfil - ";
      return view('usuarios.perfil', compact('usuarios', 'titulo'));
    }

    //função para excluir usuários
    public function excluir($id){
  		$user = User::find($id);
  		if($user->nivel == 1){
  			Session::flash('type', 'danger');
        Session::flash('icon', 'ban');
  			Session::flash('message', 'Não é possível excluir o usuário administrador');
  			return redirect('usuarios');
  		}else{
  			User::destroy($id);
        Session::flash('type', 'success');
        Session::flash('icon', 'check');
  			Session::flash('message', 'Usuário excluir com successo!');
  			return redirect('usuarios');
  		}
  	}

    //função cara a view editar selecionando o usuário pelo o ID para atualizar
    public function editar($id){
      $titulo = "Editando Usuários - ";
        $user = User::all();
        $usuarios = User::find($id);
        if($usuarios->nivel != 0 && Auth::user()->nivel != 1){
          Session::flash('type', 'danger');
          Session::flash('icon', 'ban');
    			Session::flash('message', 'Você não tem permissão para editar esse usuário');
    			return redirect('usuarios');
        }else{
          return view('usuarios.editar', compact('usuarios', 'user', 'titulo'));
        }
    }

    //função para atualizar o usuário
    public function atualizar(Request $request){
      $usuarios = $request->all();
  		$validator = $this->validator_editar($request->all());
  		if ($validator->fails())
  		{
  			$this->throwValidationException(
  				$request, $validator
  			);
  		}
      $nivel = (isset($usuarios['nivel']) ? $usuarios['nivel'] : 0);
  		User::where('id', $usuarios['put'])->update([ 'name' => $usuarios['name'], 'endereco' => $usuarios['endereco'], 'telefone' => $usuarios['telefone'], 'nivel' => $nivel ]);
      Session::flash('type', 'success');
      Session::flash('icon', 'check');
  		Session::flash('message', 'Usuário atualizado com sucesso!');
  		return redirect('usuarios');
    }

    //função para validação dos campos editar usuário
    public function validator_editar(array $data){
      $messages = [
          'name.required' => 'Por favor digite seu nome',
          'endereco.required' => 'Por favor digite seu endereço',
          'telefone.required' => 'Por favor digite seu telefone',
      ];
  		return Validator::make($data, [
  			'name' => 'required|max:255',
        'endereco' => 'required|max:255',
        'telefone' => 'required|max:255',
  		], $messages);
  	}
}
