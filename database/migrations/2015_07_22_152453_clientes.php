<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clientes', function (Blueprint $table){
        $table->increments('id_cli');
        $table->string('nome', 100);
        $table->string('endereco');
        $table->string('telefone');
        $table->string('cpf', 14);
        $table->string('obs');
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
        Schema::drop('clientes');
    }
}
