<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategoria extends Model{
    
    protected $table = 'post_categorias';

    protected $primaryKey = 'post_cat_id';

    protected $fillable = ['titulo'];
}
