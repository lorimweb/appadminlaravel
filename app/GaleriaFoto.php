<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleriaFoto extends Model{
    
    protected $table = 'galeria_fotos';

    protected $fillable = ['galeria_id', 'file_name', 'file_path'];

    public function galeria(){
    	return $this->belongsTo('App\Galeria');
    }
}
