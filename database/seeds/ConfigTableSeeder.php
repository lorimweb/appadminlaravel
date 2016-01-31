<?php

use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = new \App\Config();
        $config->appnome = "App Admin";
        $config->slogan = "Desenvolvedor Web";
        $config->url = "www.seusite.com.br";
        $config->temas = "default";
        $config->layout = "0";
        $config->toggled = "default";
        $config->sobre = "Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos...";
        $config->save();
    }
}
