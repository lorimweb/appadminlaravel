<?php

use Illuminate\Database\Seeder;

class CustomUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory('App\User', 5)->create([
        'nivel' =>0,
      ]);
    }
}
