<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\GaleriaFoto;
use App\Galeria;
use Validator;
use Storage;
use Session;
use Auth;

class GaleriaController extends Controller
{
    //
    public function getIndex(){
        $titulo = "Lista de Galeria - ";
        $galeria = Galeria::all();
        return view ('galeria.index', compact('titulo', 'galeria'));
    }

    public function getCadastro(){
    	$titulo = "Cadastro de Galeria";
    	return view('galeria.cadastro', compact('titulo'));
    }

    public function postInserir(Request $request){
    	$validator = $this->val_inserir($request->all());
		if ($validator->fails()) { $this->throwValidationException($request, $validator); }
    	Galeria::create([
    		'titulo' 	=> $request->titulo,
    		'descricao' => $request->descricao,
    		'slug' 		=> ($request['slug'] != '') ? $request['slug'] = str_slug($request['slug']) : $request['slug'] = str_slug($request['titulo']),
    		'data' 		=> date("Y-m-d", strtotime(str_replace('/', '-', $request->data))),
    		'fotografo' => $request->fotografo,
    		'user_id'	=> Auth::user()->id
    	]);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Galeria cadastrada com sucesso');
        return redirect('galeria');
    }

	protected function val_inserir(array $data){
		$messages = [
			'titulo.required'		=> 'Por favor digite um titulo.',
			'descricao.required'	=> 'Por favor digite uma descrição.',
			'data.required' 		=> 'Por favor digite uma data.',
			'fotografo.required'	=> 'Por favor digite o nome do fotografo.',
		];
		return Validator::make($data, [
			'titulo' 	=> 'required',
			'descricao' => 'required',
			'data'		=> 'required',
			'fotografo' => 'required',
		], $messages);
	}

	public function getActive($id, $active){
		Galeria::where('galeria_id', $id)->update(['ativo' => $active]);
		return 'true';
	}

	public function getEditar($id){
    	$titulo = "Editar Galeria";
    	$galeria = Galeria::find($id);
    	return view('galeria.editar', compact('titulo', 'galeria'));
	}

	public function getFoto($id){
    	$titulo = "Adicionar Foto";
        $galeria_list = Galeria::all();
        $galeria = Galeria::find($id);
        $fotos  = GaleriaFoto::where('galeria_id', $galeria->galeria_id)->get();
    	return view('galeria.addfoto', compact('titulo', 'galeria', 'fotos', 'galeria_list'));
	}

	public function postUpload(Request $request){
		$file = $request->file('file');
	    $filename = uniqid() . $file->getClientOriginalName();
	    $file->move('assets/uploads/galeria', $filename);
		$galeria = Galeria::find($request->input('galeria_id'));
		$image = $galeria->imagens()->create([
			'galeria_id' => $request->input('galeria_id'),
			'file_name'  => $filename,
			'file_path'  => 'assets/uploads/galeria/' . $filename
		]);
	}

    public function getDeletefoto($id){
        $foto = GaleriaFoto::find($id);
        Storage::delete($foto->file_path);
        GaleriaFoto::destroy($id);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Foto deleta com sucesso');
        return redirect()->back();
    }

    public function postUpdate(Request $request){
    	$validator = $this->val_inserir($request->all());
		if ($validator->fails()) { $this->throwValidationException($request, $validator); }
    	Galeria::where('galeria_id', $request['put'])->update([
    		'titulo' 	=> $request->titulo,
    		'descricao' => $request->descricao,
    		'slug' 		=> ($request['slug'] != '') ? $request['slug'] = str_slug($request['slug']) : $request['slug'] = str_slug($request['titulo']),
    		'data' 		=> date("Y-m-d", strtotime(str_replace('/', '-', $request->data))),
    		'fotografo' => $request->fotografo,
    		'user_id'	=> Auth::user()->id
    	]);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Galeria atualizada com sucesso');
        return redirect('galeria');
    }

    public function getExcluir($id){
        $fotos = GaleriaFoto::where('galeria_id', $id)->get();
        foreach ($fotos as $f):
            Storage::delete($f->file_path);
            GaleriaFoto::destroy($f->id);
        endforeach;

    	Galeria::destroy($id);
    	Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Galeria deletada com sucesso');
        return redirect('galeria');
    }

}
