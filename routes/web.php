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
use App\Encomienda;
Route::group(['middleware' => 'auth'], function ()
{
  Route::get('/', function () {
      return view('inicio');
  });

  Route::get('inicio', function () {
      return view('inicio');
  });

  Route::get('entrega', 'EncomiendaController@index');

  Route::get('despachados', 'EncomiendaController@despachados');

  Route::get ("reportes", function(){
    $localidades=DB::table('encomiendas')->select('destino_encomienda')->groupBy('destino_encomienda')->get();
    return View::make('reportes')->with('localidades', $localidades);

  });

  Route::get ("editar", function(){
    return view ("editar");
  });

  Route::post("rempordni", 'EnvioController@buscarrem');
  Route::post("destpordni", 'EnvioController@buscardest');
  Route::post("buscarencomienda", 'EncomiendaController@busqueda');
  Route::post("buscarencomiendadespach", 'EncomiendaController@busquedadespach');
  Route::post("storeencomiendas", 'EnvioController@store');

  Route::get('encomiendas/{id}/entregado', 'EncomiendaController@entregado');
  Route::post('encomiendas/{id}/actualizar', 'EnvioController@update');
  Route::get('encomiendas/{id}/editar', 'EnvioController@edit');
  Route::post('encomiendasexcel', 'ExcelController@exportEncomiendas');

});

Route::get("login", function(){
  return view("inicio");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('inicio');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
