<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contato', function(Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->boolean('status')->default(false);
            $table->string('msg');
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
        Schema::drop('contato');
    }
}
