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
// usage inside a laravel route
Route::get('/', 'FrontEndController@index');
Route::post('contato/enviar_msg', 'FrontEndController@enviar_msg');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Rotas com prefixo usuarios
Route::group(['prefix' => '/usuarios', 'middleware' => 'auth'], function(){
	Route::controller('/', 'UsuariosController');
});

// Rotas com prefixo produtos
Route::group(['prefix' => '/produtos', 'middleware' => 'auth'], function(){
	Route::controller('/', 'ProdutosController');
});

// Rotas com prefixo config
Route::group(['prefix' => '/config', 'middleware' => 'auth'], function(){
	Route::controller('/', 'ConfigController');
});

// Rotas com prefixo config
Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function(){
	Route::controller('/', 'DashboardController');
});

// Back-end...
// Route::group(['middleware' => 'auth'], function () {
//   Route::get('dashboard', 'DashboardController@index');
//
//   //Usuários
//   Route::get('usuarios', 'UsuariosController@index');
//   Route::get('usuarios/cadastro', 'UsuariosController@cadastro');
//   Route::post('usuarios/inserir', 'UsuariosController@inserir');
//   Route::post('usuarios/atualizar', 'UsuariosController@atualizar');
//   Route::get('usuarios/excluir/{id}', 'UsuariosController@excluir');
//   Route::get('usuarios/editar/{id}', 'UsuariosController@editar');
//   Route::get('usuarios/perfil', 'UsuariosController@perfil');
//   Route::post('usuarios/perfil_update', 'UsuariosController@perfil_update');
//   Route::post('usuarios/upload_foto', 'UsuariosController@upload_foto');
//   Route::post('usuarios/update_senha', 'UsuariosController@update_senha');
//
//   //Produtos
//   Route::get('produtos', 'ProdutosController@index');
//   Route::get('produtos/cadastro', 'ProdutosController@cadastro');
//   Route::post('produtos/inserir', 'ProdutosController@inserir');
//   Route::get('produtos/editar/{id}', 'ProdutosController@editar');
//   Route::get('produtos/excluir/{id}', 'ProdutosController@excluir');
//   Route::post('produtos/atualizar', 'ProdutosController@atualizar');
//
//   //Clientes
//   Route::get('clientes', 'ClientesController@index');
//   Route::get('clientes/cadastro', 'ClientesController@cadastro');
//   Route::post('clientes/inserir', 'ClientesController@inserir');
//   Route::get('clientes/editar/{id}', 'ClientesController@editar');
//   Route::get('clientes/excluir/{id}', 'ClientesController@excluir');
//   Route::post('clientes/atualizar', 'ClientesController@atualizar');
//
//   //Categorias
//   Route::get('categorias', 'CategoriasController@index');
//   Route::get('categorias/cadastro', 'CategoriasController@cadastro');
//   Route::post('categorias/inserir', 'CategoriasController@inserir');
//   Route::get('clientes/editar/{id}', 'ClientesController@editar');
//   Route::get('clientes/excluir/{id}', 'ClientesController@excluir');
//   Route::post('clientes/atualizar', 'ClientesController@atualizar');
//
//   //Portfolio
//   Route::get('portfolio', 'PortfolioController@index');
//   Route::get('portfolio/cadastro', 'PortfolioController@cadastro');
//   Route::post('portfolio/inserir', 'PortfolioController@inserir');
//   Route::get('portfolio/editar/{id}', 'PortfolioController@editar');
//   Route::get('portfolio/excluir/{id}', 'PortfolioController@excluir');
//   Route::post('portfolio/atualizar', 'PortfolioController@atualizar');
//
//   //Configurações
//   Route::get('config', 'ConfigController@index');
//   Route::post('config/atualizar', 'ConfigController@atualizar');
// });
