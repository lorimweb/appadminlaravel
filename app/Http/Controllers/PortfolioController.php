<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Portfolio;
use Session;
use Storage;
use File;

class PortfolioController extends Controller{

    public function getIndex(){
        $titulo = "Portfólio Cadastrados";
        $portfolio  = Portfolio::all();
        return view('portfolio.index', compact('titulo', 'portfolio'));
    }

    public function getCadastro(){
        $titulo = "Cadastro de Portfólio";
        return view('portfolio.cadastro', compact('titulo'));
    }

    public function postInserir(Request $request){
        $validator = $this->validator($request->all());
        if ($validator->fails()) { $this->throwValidationException($request, $validator); }
        $file = $request->file('file');
        $filename = uniqid() . $file->getClientOriginalName();
        $file->move('assets/uploads/portfolio', $filename);
        Portfolio::create([
            'titulo'    =>  $request->titulo,
            'job'       =>  $request->job,
            'url'       =>  $request->url,
            'img_name'  =>  $filename,
            'img_path'  =>  'assets/uploads/portfolio/' .$filename
        ]);
        Session::flash('type', 'success');
        Session::flash('icon', 'check');
        Session::flash('message', 'Portfolio cadastrado com sucesso!');
        return redirect('portfolio');
    }

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

    public function getEditar($id){
        $titulo = "Editando Portfólio";
        $portfolio = Portfolio::find($id);  
        return view('portfolio.editar', compact('titulo', 'portfolio')); 
    }

    public function postUpdate(Request $request){
        $validator = $this->validator($request->all());
        if ($validator->fails()) { $this->throwValidationException($request, $validator); }
        Portfolio::where('id', $request['put'])->update([
            'titulo'    =>  $request->titulo,
            'job'       =>  $request->job,
            'url'       =>  $request->url
        ]);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Portfolio atualizado com sucesso');
        return redirect('portfolio');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getExcluir($id){
        $image = Portfolio::where('id', $id)->get();
        foreach($image as $img):
            Storage::delete($img->img_path);
        endforeach;
        Portfolio::destroy($id);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Portfolio deletado com sucesso');
        return redirect('portfolio');
    }
}
