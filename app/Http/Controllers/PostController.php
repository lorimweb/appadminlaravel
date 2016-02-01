<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\PostCategoria;
use App\PostImagem;
use Validator;
use App\Post;
use App\User;
use Session;
use Storage;
use Auth;

class PostController extends Controller{

	public function getIndex(){
		$titulo	= "Listagem de Post";
		$post 	= Post::all();
		return view('post.index', compact('titulo', 'post', 'user', 'cat'));
	}

	public function getCadastro(){
		$titulo = "Cadastro de Post";
		$cat 	= PostCategoria::all();
		return view('post.cadastro', compact('titulo', 'cat'));
	}

    public function postInserir(Request $request){
    	$validator = $this->validator($request->all());
		if ($validator->fails()) { $this->throwValidationException($request, $validator); }
    	Post::create([
    		'titulo' 		=> $request->titulo,
    		'slug' 			=> ($request['slug'] != '') ? $request['slug'] = str_slug($request['slug']) : $request['slug'] = str_slug($request['titulo']),
    		'data' 			=> date("Y-m-d", strtotime(str_replace('/', '-', $request->data))),
    		'conteudo'		=> $request->conteudo,
    		'post_cat_id'	=> $request->post_cat_id,
    		'user_name'		=> Auth::user()->name
    	]);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Post cadastrado com sucesso');
        return redirect('post');
    }

    public function postInserircat(Request $request){
    	PostCategoria::create([
    		'titulo' 	=> $request->titulo
    	]);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Categoria cadastrada com sucesso');
        return redirect('post/cadastro');
    }

	public function getEditar($id){
    	$titulo = "Editar Post";
    	$post = Post::find($id);
    	$cat 	= PostCategoria::all();
    	return view('post.editar', compact('titulo', 'post', 'cat'));
	}

 	public function getAtivo($id, $ativo){
		Post::where('post_id', $id)->update(['ativo' => $ativo]);
		return 'true';
	}   

	public function getImagem($id){
    	$titulo		= "Adicionar Foto";
        $post_list 	= Post::all();
        $post 		= Post::find($id);
        $imagens  	= PostImagem::where('post_id', $post->post_id)->get();
    	return view('post.addfoto', compact('titulo', 'post', 'imagens', 'post_list'));
	}

	public function postUpload(Request $request){
		$file = $request->file('file');
	    $filename = uniqid() . $file->getClientOriginalName();
	    $file->move('assets/uploads/post', $filename);
		$post = Post::find($request->input('post_id'));
		$image = $post->imagens()->create([
			'post_id'	=> $request->input('post_id'),
			'img_name'  => $filename,
			'img_path'  => 'assets/uploads/post/' . $filename
		]);
	}

    public function getDeleteimagem($id){
        $imagens = PostImagem::find($id);
        Storage::delete($imagens->img_path);
        PostImagem::destroy($id);
        Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Imagem deleta com sucesso');
        return redirect()->back();
    }

	protected function validator(array $data){
		$messages = [
			'titulo.required'	=> 'Por favor digite um titulo.',
			'data.required' 	=> 'Por favor digite uma data.',
			'conteudo.required'	=> 'Por favor digite um conteudo.',
		];
		return Validator::make($data, [
			'titulo'	=> 'required',
			'data'		=> 'required',
			'conteudo'	=> 'required',
		], $messages);
	}

    public function getExcluir($id){
        $imagens = PostImagem::where('post_id', $id)->get();
        foreach ($imagens as $img):
            Storage::delete($img->img_path);
            PostImagem::destroy($img->post_img_id);
        endforeach;

    	Post::destroy($id);
    	Session::flash('type', 'success');
        Session::flash('icon', 'ban');
        Session::flash('message', 'Post deletado com sucesso');
        return redirect('post');
    }
}
