<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use Auth;

class ConfigController extends Controller
{
    public function getIndex(){
        $titulo = "Configurações";
        $config = \App\Config::all();
        return view('config.config', compact('titulo', 'config'));
    }

    public function postAtualizar(Request $request){
        if(Auth::user()->nivel == 1){
            $config = $request->all();
            $validator = $this->validator($request->all());
            if ($validator->fails()){
                $this->throwValidationException($request, $validator);
            }
            \App\Config::where('id', $config['put'])->update(
                ['appnome' => $config['appnome'],
                'slogan' => $config['slogan'],
                'url' => $config['url'],
                'temas' => $config['temas'],
                'layout' => $config['layout'],
                'toggled' => $config['toggled'],
                'sobre' => $config['sobre']
            ]);
            Session::flash('type', 'success');
            Session::flash('icon', 'check');
            Session::flash('message', 'Aplicação atualizada com sucesso!');
            return redirect('config');
        }else{
            Session::flash('type', 'error');
            Session::flash('icon', 'ban');
            Session::flash('message', 'Seu usuário não tem permissão para modificar');
            return redirect('config');
        }
    }

    public function validator(array $data){
      $messages = [
          'appnome.required' => 'Por favor digite o nome da aplicação',
          'slogan.required' => 'Por favor digite um slogan',
          'url.required' => 'Por favor digite uma url',
          'sobre.required' => 'Por favor digite um sobre',
      ];
        return Validator::make($data, [
        'appnome' => 'required|max:255',
        'slogan' => 'required|max:255',
        'url' => 'required|max:255',
        'sobre' => 'required',
        ], $messages);
    }
}
