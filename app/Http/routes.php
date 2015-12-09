<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FrontEndController@index');
Route::post('contato/enviar_msg', 'FrontEndController@enviar_msg');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth'], function () {
  Route::get('dashboard', 'DashboardController@index');
  //Usuários
  Route::get('usuarios', 'UsuariosController@index');
  Route::get('usuarios/cadastro', 'UsuariosController@cadastro');
  Route::post('usuarios/inserir', 'UsuariosController@inserir');
  Route::post('usuarios/atualizar', 'UsuariosController@atualizar');
  Route::get('usuarios/excluir/{id}', 'UsuariosController@excluir');
  Route::get('usuarios/editar/{id}', 'UsuariosController@editar');
  Route::get('usuarios/perfil', 'UsuariosController@perfil');
  //Produtos
  Route::get('produtos', 'ProdutosController@index');
  Route::get('produtos/cadastro', 'ProdutosController@cadastro');
  Route::post('produtos/inserir', 'ProdutosController@inserir');
  Route::get('produtos/editar/{id}', 'ProdutosController@editar');
  Route::get('produtos/excluir/{id}', 'ProdutosController@excluir');
  Route::post('produtos/atualizar', 'ProdutosController@atualizar');
  //Clientes
  Route::get('clientes', 'ClientesController@index');
  Route::get('clientes/cadastro', 'ClientesController@cadastro');
  Route::post('clientes/inserir', 'ClientesController@inserir');
  Route::get('clientes/editar/{id}', 'ClientesController@editar');
  Route::get('clientes/excluir/{id}', 'ClientesController@excluir');
  Route::post('clientes/atualizar', 'ClientesController@atualizar');
  //Categorias
  Route::get('categorias', 'CategoriasController@index');
  Route::get('categorias/cadastro', 'CategoriasController@cadastro');
  Route::post('categorias/inserir', 'CategoriasController@inserir');
  Route::get('clientes/editar/{id}', 'ClientesController@editar');
  Route::get('clientes/excluir/{id}', 'ClientesController@excluir');
  Route::post('clientes/atualizar', 'ClientesController@atualizar');
});
