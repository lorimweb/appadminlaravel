<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Portfolio;
use Session;
use Input;
use File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $titulo = "Portfólio Cadastrados";
        $portfolio  = Portfolio::all();
        return view('portfolio.index', compact('titulo', 'portfolio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cadastro()
    {
        $titulo = "Cadastro de Portfólio";
        return view('portfolio.cadastro', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inserir(Request $request)
    {
        if(Input::file('img'))
        {
            $image = Input::file('img');
            $filename  = $image->getClientOriginalExtension();

            if($filename != 'jpg' && $filename != 'png'){
                return back()->with('erro', 'Arquivo não permitido');
            }
        }
        $port = new Portfolio;
        $port->titulo = Input::get('titulo');
        $port->job = Input::get('job');
        $port->url = Input::get('url');
        $port->img = "";
        $port->save();
        if(Input::file('img'))
        {
            File::move($image, public_patch().'/assets/uploads/id'.$port->id.'.'.$filename);
            $port->img = public_patch().'/assets/uploads/id'.$port->id.'.'.$filename;
            $port->save();
        }
        Session::flash('type', 'success');
        Session::flash('icon', 'check');
        Session::flash('message', 'Portfolio cadastrado com sucesso!');
        return redirect('portfolio');
    }

    // funçao para validar os dados do cadastro de usuários
    public function validator(array $data){
      $messages = [
        'titulo.required' => 'Por favor digite um Titulo',
        'job.required' => 'Por favor digite um Job',
        'url.required' => 'Por favor digite uma URL',
      ];
  		return Validator::make($data, [
        'titulo' => 'required|max:255',
        'job' => 'required|max:255',
        'url' => 'required|max:255',
  		], $messages);
  	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
