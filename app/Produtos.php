<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model{
    protected $table = 'produtos';
    protected $fillable = ['descricao', 'slug', 'preco', 'qtdade', 'obs'];


    public function setUrlAttribute($value){
    if ($value=='')
      $value = $this->attributes['descricao'];
      $this->attributes['slug'] = str_slug($value);
    }

    public function categorias(){
      return $this->belongsToMany('App\Categorias');
    }
}
