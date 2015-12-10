<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Session;

class FrontEndController extends Controller{

	public function index(){
		return view('front-end.index');
	}

	public function enviar_msg(Request $request){
		$contato = $request->all();
		$validator = $this->validator($request->all());
  		if ($validator->fails()){
  			$this->throwValidationException(
  				$request, $validator
  			);
  		}
  		\App\Contato::create([
  		'nome' => $contato['nome'],
  		'assunto' => $contato['assunto'],
        'email' => $contato['email'],
        'msg' => $contato['msg'],
  		]);
		Session::flash('type', 'success');
		Session::flash('icon', 'check');
		Session::flash('message', 'Mensagem enviada com sucesso, em breve entrarei em contato!');
		return redirect('/');
	}

    // funçao para validar os dados da mensagem
    public function validator(array $data){
      $messages = [
	      'nome.required' => 'Por favor digite seu nome',
	      'assunto.required' => 'Por favor digite um assunto',
	      'email.required' => 'Por favor digite seu email',
	      'msg.required' => 'Por favor digite uma mensagem',
      ];
  		return Validator::make($data, [
		'nome' => 'required|max:255',
		'assunto' => 'required|max:255',
		'email' => 'required|email',
		'msg' => 'required',
  		], $messages);
  	}
}
