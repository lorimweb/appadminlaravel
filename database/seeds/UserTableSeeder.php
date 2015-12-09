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
        $user->name = "LorimWeb";
        $user->nivel = "1";
        $user->email = "lorimweb@gmail.com";
        $user->password = Hash::make(513021);
        $user->save();
    }
}
