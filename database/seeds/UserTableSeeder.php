<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory('App\User', 10)->create();
        $user = new \App\User();
        $user->name = "Administrador";
        $user->sobre_nome = "Desenvolvedor Web";
        $user->telefone = "(00) 00000-0000";
        $user->nivel = "1";
        $user->email = "admin@site.com";
        $user->password = Hash::make('admin');
        $user->sobre = "Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos...";
        $user->save();
    }
}
