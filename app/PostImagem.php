<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImagem extends Model{

	protected $table = 'post_imagems';

	protected $primaryKey = 'post_img_id';

	protected $fillable = ['img_name', 'img_path', 'post_id'];

    public function galeria(){
    	return $this->belongsTo('App\Post');
    }	
}
