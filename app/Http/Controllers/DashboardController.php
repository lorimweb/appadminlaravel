<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller{

    public function index(){
      $titulo = "Dashboard - ";
      return view('dashboard', compact('titulo'));
    }
}
