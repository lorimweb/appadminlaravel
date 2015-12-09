<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produtos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('produtos', function(Blueprint $table){
        $table->increments('id');
        $table->string('descricao');
        $table->string('slug');
        $table->decimal('preco', 10,2);
        $table->integer('qtdade');
        $table->text('obs');
        $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('produtos');
    }
}
