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

  Route::get('inicio', 'EnviosController@index');

  Route::get ("entrega", function(){
  	return view ("entrega");
  });
  Route::get('entrega', 'EncomiendasController@index');

  Route::get ("cliente", function(){
  	return view ("cliente");
  });
  Route::post("inicioajax", 'EnviosController@buscar');
  Route::post("inicioajax2", 'EnviosController@buscar2');
  Route::post("inicio", 'EnviosController@store');

  Route::get('users', function () {
      $users = User::paginate(5);

      return view('some.view')->withUsers($users);

  });

  Route::get('encomiendas/{id}/entregado', 'EncomiendasController@entregado');
});

Route::get("login", function(){
  return view("inicio");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
