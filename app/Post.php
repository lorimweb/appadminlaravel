<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    protected $table = 'posts';

    protected $primaryKey = 'post_id';

    protected $fillable = ['post_cat_id', 'titulo', 'slug', 'data', 'ativo', 'conteudo', 'user_name'];

    public function imagens(){
    	return $this->hasMany('App\PostImagem');
    }    
}
