<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth'], function ()
{
  Route::get('/', function () {
      return view('inicio');
  });

  Route::get('/inicio', function () {
      return view('inicio');
  });
  Route::get ("entrega", function(){
  	return view ("entrega");
  });
  Route::get('entrega', 'EncomiendasController@index');

  Route::get ("cliente", function(){
  	return view ("cliente");
  });
  Route::get ("editar", function(){
    return view ("editar");
  });

  Route::post("inicioajax", 'EnviosController@buscar');
  Route::post("inicioajax2", 'EnviosController@buscar2');
  Route::post("inicio", 'EnviosController@store');

  Route::get('encomiendas/{id}/entregado', 'EncomiendasController@entregado');
  Route::get('encomiendas/{id}/editar', 'EnviosController@edit');

});

Route::get("login", function(){
  return view("inicio");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
