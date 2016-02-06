<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\PostCategoria;
use App\Portfolio;
use App\User;
use App\Post;

class BlogController extends Controller{

    public function getIndex(){
        $user 	= User::all();
        $post	= Post::all();
        $cat	= PostCategoria::all();
        return view('blog.index', compact('user', 'cat', 'post'));
    }

    public function getPost($slug){
        $user 	= User::all();
        //$post	= Post::find($slug);
        $cat	= PostCategoria::all();
        $post 	= Post::where('slug', $slug)->get();
        return view('blog.post', compact('user', 'cat', 'post'));
    }
}
