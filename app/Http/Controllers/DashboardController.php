<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function getIndex(){
      $titulo = "Dashboard - ";
      $config = \App\Config::all();
      return view('dashboard', compact('titulo', 'config'));
    }
}
