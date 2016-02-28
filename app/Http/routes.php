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

// Rotas com prefixo blog
Route::group(['prefix' => '/blog'], function(){
	Route::controller('/', 'BlogController');
});
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

// Rotas com prefixo dashboard
Route::group(['prefix' => '/dashboard', 'middleware' => 'auth'], function(){
	Route::controller('/', 'DashboardController');
});

// Rotas com prefixo galeria
Route::group(['prefix' => '/galeria', 'middleware' => 'auth'], function(){
	Route::controller('/', 'GaleriaController');
});

// Rotas com prefixo produtos
Route::group(['prefix' => '/produtos', 'middleware' => 'auth'], function(){
	Route::controller('/', 'ProdutosController');
});

// Rotas com prefixo skill
Route::group(['prefix' => '/skill', 'middleware' => 'auth'], function(){
	Route::controller('/', 'SkillController');
});

// Rotas com prefixo portfolio
Route::group(['prefix' => '/portfolio', 'middleware' => 'auth'], function(){
	Route::controller('/', 'PortfolioController');
});
// Rotas com prefixo post
Route::group(['prefix' => '/post', 'middleware' => 'auth'], function(){
	Route::controller('/', 'PostController');
});
