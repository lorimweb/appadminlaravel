<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    //
    protected $table = 'galerias';
    protected $primaryKey = 'galeria_id';

    protected $fillable = ['titulo', 'descricao', 'slug', 'data', 'fotografo', 'ativo', 'user_id'];

    public function imagens(){
    	return $this->hasMany('App\GaleriaFoto');
    }
}
