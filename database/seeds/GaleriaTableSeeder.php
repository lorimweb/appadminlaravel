<?php

use Illuminate\Database\Seeder;

class GaleriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galeria = new \App\Galeria();
        $galeria->titulo = "Galeria de teste";
        $galeria->descricao = "Descrição de teste";
        $galeria->slug = "galeria-teste";
        $galeria->data = date('Y-m-d');
        $galeria->fotografo = "Justin Bieber";
        $galeria->user_id = 1;
    }
}
